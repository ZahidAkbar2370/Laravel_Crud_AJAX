<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;
// use App\mendor\mpdf\mpdf;

class StudentController extends Controller
{
    public function index()
    {
        $student=Student::all();
    	return view("studentform")->with("all_listing",$student);
    }
    public function store(Request $request)
    {
        $student=new Student();
        
        $student->fname=$request->input("fname");
    	$student->lname=$request->input("lname");
    	$student->course=$request->input("course");
    	$student->section=$request->input("section");

    	$student->save();


    } 
     public function delete($id)
    {
       $student=Student::find($id);
       $student->delete();

       return redirect('student');
 
    } 
     public function update(Request $request,$id)
    {
         $student=Student::find($id);
        
        $student->fname=$request->input("fname");
        $student->lname=$request->input("lname");
        $student->course=$request->input("course");
        $student->section=$request->input("section");

        $student->save();

    }
    public function excel(Request $request)
    {
        $html="Zahid";
        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=report.xls');
        echo $html;

    }
    public function pdf(Request $request)
    {
        $student=Student::all();
        // $student = DB::select("select * from students");
       // dd($student);
          
        require('vendor/autoload.php');
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($student);
        $file=time().'.pdf';
        $mpdf->output($file,'D');

    }
    public function email(Request $request)
    {
    require('smtp/PHPMailerAutoload.php');

    $mail=new \PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="janujakhar2370@gmail.com";
    $mail->Password="jakhar2370";
    $mail->SetFrom("janujakhar2370@gmail.com");
    $mail->addAddress("zahidjakhar2370@gmail.com");
    $mail->IsHTML(true);
    $mail->Subject="New Contact Us";
    $mail->Body="tesing";
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if($mail->send()){
        return redirect('students ');
    }else{
        echo("error");
    }
        }
}
