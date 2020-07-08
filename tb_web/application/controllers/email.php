<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    class Email extends CI_Controller{
        public function __construct(){
            parent::__construct();

            // load PHPMailer
            require APPPATH.'libraries/PHPMailer/src/Exception.php';
            require APPPATH.'libraries/PHPMailer/src/PHPMailer.php';
            require APPPATH.'libraries/PHPMailer/src/SMTP.php';

            //load model untuk dapetin data yang dibutuhkan
            $this->load->model('model_notif');

        }

        public function mailSend($time){
             // Buat object PHPMailer baru
             $mail = new PHPMailer();
			echo "1";
             // Server Settings untuk menggunakan server gmail
             $mail->IsSMTP();
             $mail->Mailer = "smtp";
             $mail->SMTPDebug  = 1;  
             $mail->SMTPAuth   = TRUE;
             $mail->SMTPKeepAlive = "true";
             $mail->SMTPSecure = "tls";
             $mail->Port       = 587;
             $mail->Host       = "smtp.gmail.com";
             $mail->Username   = "studymanage2020@gmail.com";
             $mail->Password   = "StudyManage2020";

             try{
                // dapetin hari skrg
                $currDay = date("D");
                //dapetin data user berdasarkan waktu
                $data = $this->model_notif->getAllMailUserByTime($time);
                
                // di loop data user 
                foreach($data as $d){
                    // Pengirim dan penerima
                    $mail->setFrom('studymanage2020@gmail.com', 'StudyManage');
                    $mail->addAddress($d->email, $d->nama);
                    //Kontent isi email
                    $mail->isHTML(true); // menggunakan format HTML untuk isi konten
                    $mail->Subject = "Info Pembelajaran";
                    
                    // dapetin data jadwal berdasarkan username dan hari sekarang
                    $jadwal = $this->model_notif->get_jadwal($d->username, $currDay);
                    
                    //header tabel jadwal
                    $headJadwal = "
                        <thead>
                            <td> <b> No </b> </td>
                            <td> <b> Nama Pelajaran </b> </td>
                            <td> <b> Nama Pengajar </b> </td>
                            <td> <b> Ruangan </b> </td>
                            <td> <b> Jam </b> </td>
                        </thead>
                    ";

                    //header tabel tugas
                    $headTugas = "
                        <thead>
                            <td> <b> No </b> </td>
                            <td> <b> Nama Tugas </b> </td>
                            <td> <b> Nama Pelajaran </b> </td>
                            <td> <b> Deadline </b> </td>
                    ";
                    $bodyJadwal = "";
                    $noJadwal = 1;
                    // loop data tabel jadwal 
                    foreach($jadwal as $tblJadwal){
                        $bodyJadwal .= "
                            <tr>
                                <td>".$noJadwal."</td>
                                <td>".$tblJadwal->nama_pelajaran."</td>
                                <td>".$tblJadwal->pengajar."</td>
                                <td>".$tblJadwal->ruangan."</td>
                                <td>".$tblJadwal->mulai.'-'.$tblJadwal->selesai."</td>
                            </tr>
                        ";
                        $noJadwal++;
                    }

                    //dapetin data tugas berdasarkan username
                    $tugas = $this->model_notif->method_tugas($d->username);
                    $bodyTugas = "";
                    $noTugas = 1;
                    foreach($tugas as $tblTugas){
                        $bodyTugas .= "
                            <tr>
                                <td>".$noTugas."</td>
                                <td>".$tblTugas->nama_tugas."</td>
                                <td>".$tblTugas->nama_pelajaran."</td>
                                <td>".$tblTugas->deadline.'-'.$tblTugas->waktu."</td>
                            </tr>
                        ";
                        $noTugas++;
                    }

                    // tutup table
                    $mail->Body = "<b>Jadwal Hari Ini</b><table>".$headJadwal."<tbody>".$bodyJadwal."</tbody></table><br>
                                   <b>Tugas Belum Selesai</b><table>".$headTugas."<tbody>".$bodyTugas."</tbody></table>";

                    // mail dikirim sesuai banyaknya user
                    $mail->send();
                    
                    //hapus semua alamat pengirim untuk iterasi berikutnya
                    $mail->clearAddresses();
                }   
 
            } catch(Exception $ex){
                echo "Error Pengiriman Pesan : {$mail->ErrorInfo}";
                $mail->getSMTPInstance()->reset();
            }

        }

        // function untuk kirim email setiap 60 menit / 1 jam
        public function sendMail60Mins(){
            // time in mins
            $time = 60;

            $this->mailSend($time);
			redirect('dashboard');
        }

        // function untuk kirim email setiap 120 menit / 2 jam
        public function sendMail120Mins(){
            // time in mins
            $time = 120;

            $this->mailSend($time);
			redirect('dashboard');
        }

        // function untuk kirim email setiap 360 menit / 6 jam
        public function sendMail360Mins(){
            // time in mins
            $time = 360;

            $this->mailSend($time);
			redirect('dashboard');
        }
    }
?>