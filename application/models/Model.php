<?php

class Model extends CI_Model

{
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
    // =========================================================================================
    public function addcar()
    {
        $img = $this->upload('car');
        $nopol = $this->input->post('txtnopol');
        $bbm = $this->input->post('txtbbm');
        $tipe = $this->input->post('txttipe');
        $merk = $this->input->post('txtmerk');
        $pj = $this->input->post('txtpj');
        $pic = $this->input->post('txtpic');
        $data = [
            "nopol" => $nopol,
            "tipe" => $tipe,
            "merk" => $merk,
            "pj" => $pj,
            "bbm" => $bbm,
            "img" => $img,
            "standby" => 1,
            "pic" => $pic
        ];
        $this->db->insert('tblcar', $data);
        $this->kirimpesan('', "Informasi : Mobil BK $nopol berhasil ditambahkan!");
        redirect('administrator/car');
    }
    public function addusermb()
    {
        $username = $this->input->post('txtusername');
        $pass = $this->input->post('txtpass');
        $nama = $this->input->post('txtnama');
        $alamat = $this->input->post('txtalamat');
        $nohp = $this->input->post('txtnohp');
        $jabatan = $this->input->post('txtjabatan');
        if ($pass == "") {
            $pass = "pln123";
        }

        $cek = $this->db->get_where('tbluser', ['username' => $username])->row_array();
        if ($cek) {
            redirect();
        } else {
            $data = [
                "username"  => $username,
                "nama"      => $nama,
                "alamat"    => $alamat,
                "nohp"      => $nohp,
                "level"     => 4,
                "jabatan"   => $jabatan,
                "aktif"     => 1,
                "standby"   => 0,
                "pass"      => password_hash($pass, PASSWORD_DEFAULT),
                "img"       => ""
            ];
            $this->db->insert('tbluser', $data);
            $this->kirimpesan('', "Informasi :\n User $username \nNama $nama \nberhasil ditambahkan!");
            redirect('administrator/user');
        }
    }
    public function adddriver()
    {

        $img = $this->upload('driver');
        $username = $this->input->post('txtusername');
        $pass = $this->input->post('txtpass');
        $nama = $this->input->post('txtnama');
        $alamat = $this->input->post('txtalamat');
        $nohp = $this->input->post('txtnohp');
        $jabatan = "Driver";
        if ($pass == "") {
            $pass = "pln123";
        }

        $cek = $this->db->get_where('tbluser', ['username' => $username])->row_array();
        if ($cek) {
            redirect();
        } else {
            $data = [
                "username"  => $username,
                "nama"      => $nama,
                "alamat"    => $alamat,
                "nohp"      => $nohp,
                "level"     => 5,
                "jabatan"   => $jabatan,
                "aktif"     => 1,
                "standby"   => 1,
                "pass"      => password_hash($pass, PASSWORD_DEFAULT),
                "img"       => $img
            ];
            $this->db->insert('tbluser', $data);
            $this->kirimpesan('', "Informasi :\n Drivers $username \nNama $nama \nberhasil ditambahkan!");
            redirect('administrator/driver');
        }
    }
    public function entry()
    {
        $gambar = $this->upload('surat_tugas');
        $surat_tugas    = $gambar;
        $tiket          = "T" . date('ymdHis') . random_int(100, 999);
        $tglpermohonan  = date('Y-m-d H:i:s');
        $username       = $this->session->userdata('gousername');
        $nama           = $this->session->userdata('gonama');
        $namapenumapang = $this->input->post('txtnama');
        $penumpang      = $this->input->post('txtpenumpang');
        $tujuan         = $this->input->post('txttujuan');
        $tglperjalanan  = $this->input->post('txttgl1');
        $tglkembali     = $this->input->post('txttgl2');
        $reqtipe        = $this->input->post('txtreq');
        $data = [
            "idtiket"       => $tiket,
            "tglpermohonan" => $tglpermohonan,
            "username"      => $username,
            "penumpang"     => $penumpang,
            "nama"          => $namapenumapang,
            "tujuan"        => $tujuan,
            "tglperjalanan" => $tglperjalanan,
            "tglkembali"    => $tglkembali,
            "reqtipe"       => $reqtipe,
            "surat_tugas"   => $surat_tugas
        ];
        $this->db->insert('tbltiket', $data);

        $this->kirimpesan('-532017387', "Permohonan :\nUser : $username \nNama: $nama \nPenumpang: $namapenumapang\nTujuan : $tujuan \nTgl Perjalanan: $tglperjalanan");
        //Monitor
        $data = [
            "idtiket" => $tiket,
            "status" => "Permohonan",
            "tgl" => date('Y-m-d H:i:s'),
            "img" => $surat_tugas
        ];
        $this->db->insert('tblmonitor', $data);
        redirect();

        // die;
    }
    public function upload($tipe = "surat_tugas")
    {
        // var_dump($tipe);
        // die;
        $this->load->library('upload');
        $config['upload_path'] = './file/' . $tipe; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);

        if ($this->upload->do_upload('txtimg')) {
            $gbr1 = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './file/' . $tipe . '/' . $gbr1['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['new_image'] = './file/' . $tipe . '/' . $gbr1['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar1 = $gbr1['file_name'];
            return $gambar1;
        } else {
            echo "Error Upload";
        }
    }
    public function uploadsatpam($status)
    {


        $username       = $this->session->userdata('gousername');
        $penumpang      = $this->input->post('txtpenumpang');
        $tujuan         = $this->input->post('txttujuan');
        $tglperjalanan  = $this->input->post('txttgl1');
        $idtiket = $this->input->post('txttiket');
        $nopol = $this->input->post('txtcar');
        $driver = $this->input->post('txtdriver');

        $this->load->library('upload');
        $config['upload_path'] = './file/monitoring/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);

        if ($this->upload->do_upload('txtimg')) {
            $gbr1 = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './file/monitoring/' . $gbr1['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['new_image'] = './file/monitoring/' . $gbr1['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $gambar1 = $gbr1['file_name'];
            if ($status == 3) {
                $updatestatus = 4;
                $imgupdate = "Mobil Keluar";
                $this->kirimpesan('-532017387', "BON-C Electronik : $idtiket \nUser : $username \nTujuan : $tujuan \nTgl Perjalanan: $tglperjalanan \nNo Polisi : $nopol \nDriver : $driver \ntelah dicek satpam dan meninggalkan kantor");
            } else {
                $imgupdate = "Mobil Masuk";
                $updatestatus = 5;
                $this->kirimpesan('-532017387', "BON-C Electronik : $idtiket \nUser : $username \nTujuan : $tujuan \nTgl Perjalanan: $tglperjalanan \nNo Polisi : $nopol \nDriver : $driver \ntelah dicek satpam dan memasuki kantor");
            }
            $idtiket = $this->input->post('txttiket');
            // Tiket
            $this->db->where('idtiket', $this->input->post('txttiket'));
            $this->db->set('status', $updatestatus);
            $this->db->update('tbltiket');

            //Monitor
            $data = [
                "idtiket" => $this->input->post('txttiket'),
                "status" => $imgupdate,
                "tgl" => date('Y-m-d H:i:s'),
                "img" => $gambar1
            ];
            $this->db->insert('tblmonitor', $data);

            if ($updatestatus == 5) {
                $this->db->where('nopol', $this->input->post('txtcar'));
                $this->db->set('standby', 1);
                $this->db->update('tblcar');

                $this->db->where('username', $this->input->post('txtdriver'));
                $this->db->set('standby', 1);
                $this->db->update('tbluser');
            }
            redirect();
        } else {
            redirect();
        }
    }
    public function approve()
    {

        $username       = $this->session->userdata('gousername');
        $penumpang      = $this->input->post('txtpenumpang');
        $tujuan         = $this->input->post('txttujuan');
        $tglperjalanan  = $this->input->post('txttgl1');
        $idtiket = $this->input->post('txttiket');
        $idcar = $this->input->post('txtcar');
        $driver = $this->input->post('txtdriver');
        $bbm = $this->input->post('txtbbm');
        $liter = $this->input->post('txtliter');
        $pesan = $this->input->post('txtpesan');
        $userapprove = $this->session->userdata('gousername');
        $tgl = date('Y-m-d H:i:s');
        $cek = $this->db->get_where('tblcar', ['idcar' => $idcar])->row_array();
        $data = [
            "idcar"     => $idcar,
            "bbm"       => $bbm,
            "liter"     => $liter,
            "driver"    => $driver,
            "pesan"     => $pesan,
            "useraprove" => $userapprove,
            "tglapprove" => $tgl,
            "status"    => 3
        ];
        $this->db->where('idtiket', $idtiket);
        $this->db->set($data);
        $this->db->update('tbltiket');


        $this->db->where('idcar', $idcar);
        $this->db->set('standby', 0);
        $this->db->update('tblcar');

        $this->db->where('username', $driver);
        $this->db->set('standby', 0);
        $this->db->update('tbluser');

        //Monitor
        $data = [
            "idtiket" => $this->input->post('txttiket'),
            "status" => "Disetujui KSA",
            "tgl" => date('Y-m-d H:i:s'),
            "img" => ""
        ];
        $this->db->insert('tblmonitor', $data);
        $this->pdf($idtiket);

        $this->kirimpesan('-532017387', "BON-C Electronik :$idtiket \n User : $username \nTujuan : $tujuan \nTgl Perjalanan: $tglperjalanan \nNo Polisi : " . $cek['nopol'] . "\nDriver : $driver");
        $this->kirimfile('-532017387', "BonC-$idtiket.pdf");
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
