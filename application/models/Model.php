<?php

class Model extends CI_Model

{

    // Count Pekerjaan
    public function myjob()
    {
        $username = $this->session->userdata('itusername');
        if ($username != "tamu") {
            $this->db->where('username', $username);
        }
        $this->db->where('tgllapor >=', date('Y-m-d') . " 00:00:00");
        $this->db->where('tgllapor <=',  date('Y-m-d') . " 23:59:45");
        $this->db->from('tblposit');
        return $this->db->count_all_results();
    }
    // Count Pekerjaan
    public function myjobbulan()
    {
        $username = $this->session->userdata('itusername');
        if ($username != "tamu") {
            $this->db->where('username', $username);
        }
        $this->db->where('tgllapor >=', date('Y-m-') . "01 00:00:00");
        $this->db->where('tgllapor <=',  date('Y-m-d') . " 23:59:45");
        $this->db->from('tblposit');
        return $this->db->count_all_results();
    }

    // Telegram ====================================================================
    public function kirimpesan($id = "", $pesan = "No Information")
    {
        $token = "1878017747:AAFEy2WWWodVshUvM2SZSygVyOCkY0utuKc";
        $username = $this->session->userdata('itusername');
        $grupdriver = '-532017387';
        $grupit = '-420849151';
        $gruphelpdesk = '-522972089';
        $poetra = '1336586572';

        if ($id == "") {
            $kirim = $poetra;
        } else {
            $kirim = $id;
        }

        $data = [
            'text' => "$pesan \n\nIni merupakan pesan otomatis Aplikasi Helpdesk Pematangsiantar. \nDikirim oleh : " . $username,
            'chat_id' => $kirim //contoh bot, group id -442697126
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));
    }
    public function kirimfile($id = "", $file)
    {
        $token = "1694805618:AAH9zoLfxt_lqJwtCInqXH_KRL0DDv3vM5w";
        // $username = $this->session->userdata('gousername');
        // $grupdriver = '-532017387';
        // $grupit = '-420849151';
        $poetra = '1336586572';
        if ($id == "") {
            $kirim = $poetra;
        } else {
            $kirim = $id;
        }


        $data = [
            // 'photo' => "https://cdn-cms.pgimgs.com/news/2020/03/jual-rumah.jpg",
            'document' => base_url() . 'file/bon-c/' . $file,
            'chat_id' => $id, //contoh bot, group id -442697126
            'caption' => "Bon-C"
        ];

        // file_get_contents("https://api.telegram.org/bot$token/sendPhoto?" . http_build_query($data));
        file_get_contents("https://api.telegram.org/bot$token/sendDocument?" . http_build_query($data));
    }


    public function pdf($id)
    {
        $this->db->join('tblcar', 'tblcar.idcar=tbltiket.idcar');
        $data["bon"] = $this->db->get_where('tbltiket', ["idtiket" => $id])->row_array();
        $data["detiluser"] = $this->db->get_where('tbluser', ["username" => $data["bon"]["username"]])->row_array();
        $data["detilapprove"] = $this->db->get_where('tbluser', ["username" => $data["bon"]["useraprove"]])->row_array();

        if ($data["bon"]["driver"] == "no driver") {
            $data["detildriver"] =  ["nama" => "nodriver"];
        } else {
            $data["detildriver"] = $this->db->get_where('tbluser', ["username" => $data["bon"]["driver"]])->row_array();
        }

        if (file_exists('file/bon-c/BonC-' . $data["bon"]["idtiket"])) {
        } else {
            $mpdf = new \Mpdf\Mpdf([
                "format"            => "A4",
                "orientation"       => "P",
                "default_font_size" =>  10,
                "default_font"      =>  "Arial"
            ]);
            $mpdf->SetWatermarkText('Bon - C');
            $mpdf->showWatermarkText = true;


            $namefile = "BonC-" . $data["bon"]["idtiket"];
            $data2 = $this->load->view('bonc', $data, TRUE);
            $mpdf->WriteHTML($data2);
            $mpdf->SetHTMLFooter("<em>Download : https://6211ksa.com/driver/file/bon-c/$namefile.pdf</em>");
            $mpdf->Output("file/bon-c/$namefile.pdf", \Mpdf\Output\Destination::FILE);
            // $mpdf->Output();
            // echo "tidak ada";


        }
    }
}
