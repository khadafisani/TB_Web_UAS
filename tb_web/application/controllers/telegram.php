<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Telegram extends CI_Controller {
        public function __construct(){
            parent::__construct();

            // load model notif
            $this->load->model('model_notif');
        }

        private function dataBot(){
            $botToken = "1201318511:AAHM0llaM38Y913IHHfiUnpT9TYjE_iaX_U";
            return $botToken;
        }

        // dapetin user telegram ID
        public function getUserTelegramID(){
            $botToken = $this->dataBot();
            $url = "https://api.telegram.org/bot". $botToken . "/getUpdates";
            $update = file_get_contents($url);
            $arrayUpdate= json_decode($update, true);
            $lastValue = end($arrayUpdate['result']);
            echo '<pre>' . print_r($lastValue, true) . '</pre>';
            
            $userId = $lastValue['message']['from']['id'];
            $userText = $lastValue['message']['text'];
            echo $userId. $userText;
            if($userText == "Cek-ID"){
                $this->sendIDMessage($userId);
            }
            redirect('/dashboard/index');
        }

        // kirim ke user telegram id nya
        public function sendIDMessage($userId){
            $botToken = $this->dataBot();
            $chat = "Telegram ID Anda Adalah ".$userId;
            file_get_contents("https://api.telegram.org/bot1201318511:AAHM0llaM38Y913IHHfiUnpT9TYjE_iaX_U/sendMessage?chat_id=".$userId."&text=".$chat);
        }

        // dapetin data jadwal dan tugas user
        private function getUserData($time){
            try {
                // dapetin hari ini
                $currDay = date("D");
                // variable untuk tampilkan data
                $jadwal = urlencode("Jadwal Hari Ini\n");
                $tugas = urlencode("\nTugas Belum Selesai\n");
                
                $dataUser = $this->model_notif->getAllTelegramUserByTime($time);
                //dapetin data user yang ada Telegram ID
                foreach($dataUser as $user){
                    $userId = $user->telegram;

                    //dapetin data jadwal
                    $dataJadwal = $this->model_notif->get_jadwal($user->username, $currDay);
                    var_dump($dataJadwal);
                    foreach($dataJadwal as $tblJadwal){
                        $jadwal .= urlencode("Nama Pelajaran : ".$tblJadwal->nama_pelajaran." \nNama Pengajar : ".$tblJadwal->pengajar." \nRuangan : ".$tblJadwal->ruangan." \nJam : ".$tblJadwal->mulai." - ".$tblJadwal->selesai."\n\n");
                    }
                    if($dataJadwal == null) {
                        $jadwal .= urlencode("Tidak Ada Jadwal\n");
                    }
                    $dataTugas = $this->model_notif->method_tugas($user->username);
                    var_dump($dataTugas);
                    foreach($dataTugas as $tblTugas){
                        $tugas .= urlencode("Nama Tugas : ".$tblTugas->nama_tugas." \nNama Pelajaran : ".$tblTugas->nama_pelajaran." \nDeadline : ".$tblTugas->deadline." ".$tblTugas->waktu."\n\n");
                    }
                    if($dataTugas == null){
                        $tugas .= urlencode("Tidak Ada Tugas\n");
                    }
                    $this->sendNotifTelegram($userId, $jadwal, $tugas);
                }
            } catch (Exception $ex){

            }
        }

        // kirim data jadwal dan tugas ke user
        public function sendNotifTelegram($userId, $jadwal, $tugas){
            $botToken = $this->dataBot();
            $message = $jadwal.$tugas;
            $urlSend = file_get_contents("https://api.telegram.org/bot".$botToken."/sendMessage?&chat_id=".$userId."&text=".$message);
        }

        // function untuk kirim email setiap 60 menit / 1 jam
        public function sendTelegram60Mins(){
            
            // waktu dalam menit
            $time = 60;

            // panggil function getUserData
            $this->getUserData($time);
			redirect("dashboard");
        }

        public function sendTelegram120Mins(){
            
            // waktu dalam menit
            $time = 120;

            // panggil function getUserData
            $this->getUserData($time);
			redirect('dashboard');
        }

        public function sendTelegram360Mins(){
            
            // waktu dalam menit
            $time = 360;

            // panggil function getUserData
            $this->getUserData($time);
			redirect('dashboard');
        }
        

    }
?>