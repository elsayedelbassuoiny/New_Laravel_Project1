<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('attendences.index')->with('subjects',$subjects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $subjectId)
    {
        $subject = Subject::find($subjectId);
        return view('attendences.show',['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function subscribe(string $subjectId)
    {
        $subject = Subject::find($subjectId);
        $students = json_decode($subject->students);

        $data = ['id,email,name,level,academic number'];
        foreach ($students as $studentId) {
            $student = Student::find($studentId);
            $line = "{$student->id},{$student->email},{$student->name},{$student->level},{$student->academic_number}";
            array_push($data, $line);
        }

        if (!file_exists('tmp')) {
            mkdir('tmp', 0777, true);
        }

        $file = "tmp/Student Names.csv";
        $fp = fopen($file, "w") or die("Unable to open file!");
        foreach ($data as $line) {
            $val = explode(",", $line);
            fputcsv($fp, $val);
        }
        fclose($fp);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        header("Content-Type: text/csv");
        readfile($file);

        $this->output_file($file, 'Student Names.csv');

    }

    private function output_file($file, $name, $mime_type='')
    {
        if(!is_readable($file)) die('File not found or inaccessible!');

        $size = filesize($file);
        $name = rawurldecode($name);
        $known_mime_types=array(
            "htm" => "text/html",
            "exe" => "application/octet-stream",
            "zip" => "application/zip",
            "doc" => "application/msword",
            "jpg" => "image/jpg",
            "php" => "text/plain",
            "xls" => "application/vnd.ms-excel",
            "ppt" => "application/vnd.ms-powerpoint",
            "gif" => "image/gif",
            "pdf" => "application/pdf",
            "txt" => "text/plain",
            "html"=> "text/html",
            "png" => "image/png",
            "jpeg"=> "image/jpg"
        );

        if($mime_type==''){
            $file_extension = strtolower(substr(strrchr($file,"."),1));
            if(array_key_exists($file_extension, $known_mime_types)){
                $mime_type=$known_mime_types[$file_extension];
            } else {
                $mime_type="application/force-download";
            };
        };
        @ob_end_clean();
        if(ini_get('zlib.output_compression'))
        ini_set('zlib.output_compression', 'Off');
        header('Content-Type: ' . $mime_type);
        header('Content-Disposition: attachment; filename="'.$name.'"');
        header("Content-Transfer-Encoding: binary");
        header('Accept-Ranges: bytes');

        if(isset($_SERVER['HTTP_RANGE']))
        {
            list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
            list($range) = explode(",",$range,2);
            list($range, $range_end) = explode("-", $range);
            $range=intval($range);
            if(!$range_end) {
                $range_end=$size-1;
            } else {
                $range_end=intval($range_end);
            }

            $new_length = $range_end-$range+1;
            header("HTTP/1.1 206 Partial Content");
            header("Content-Length: $new_length");
            header("Content-Range: bytes $range-$range_end/$size");
        } else {
            $new_length=$size;
            header("Content-Length: ".$size);
        }

        $chunksize = 1*(1024*1024);
        $bytes_send = 0;
        if ($file = fopen($file, 'r'))
        {
            if(isset($_SERVER['HTTP_RANGE']))
            fseek($file, $range);

            while(!feof($file) &&
                (!connection_aborted()) &&
                ($bytes_send<$new_length)
            )
            {
                $buffer = fread($file, $chunksize);
                echo($buffer);
                flush();
                $bytes_send += strlen($buffer);
            }
            fclose($file);
        } else
            die('Error - can not open file.');
        die();
    }

}
