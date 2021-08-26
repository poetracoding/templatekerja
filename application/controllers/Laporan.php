<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('itusername') == null) {
            redirect('akses');
        }
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        redirect();
    }
    public function harian()
    {
        $this->form_validation->set_rules('txttgl1', 'Tanggal', 'trim|required');
        if ($this->form_validation->run() == false) {
            // // Tampilan
            $this->load->view('template/head');
            $this->load->view('template/title');
            $this->load->view('template/css');
            $this->load->view('template/datatablecss');
            $this->load->view('template/body');
            // $this->load->view('template/notifikasi');
            $this->load->view('template/judulapp');
            $this->load->view('template/menu');
            // $this->load->view('template/judulpage');
            $this->load->view('template/isiatas');
            $this->load->view('laporan/isi');
            $this->load->view('template/isiakhir');
            $this->load->view('template/footer');
            $this->load->view('template/js');
            $this->load->view('template/datatablejs');
            $this->load->view('template/sweetalert');

            $this->load->view('template/add');
            $this->load->view('template/end');
        } else {
            $tgl1 = $this->input->post('txttgl1');
            $tgl2 = $this->input->post('txttgl2');
            $this->db->where('tgllapor >=', $tgl1 . " 00:00:00");
            $this->db->where('tgllapor <=', $tgl2 . " 23:59:45");
            $this->db->join('tblulp', 'tblulp.kodeulp=tblposit.unit');
            $data = $this->db->get("tblposit")->result();
            // var_dump($data);
            // die;
            $fileName = "Posit.xlsx";

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Bidang');
            $sheet->setCellValue('C1', 'Sub Bidang');
            $sheet->setCellValue('D1', 'NIP');
            $sheet->setCellValue('E1', 'Nama');
            $sheet->setCellValue('F1', 'Status');
            $sheet->setCellValue('G1', 'Tanggal Lapor');
            $sheet->setCellValue('H1', 'Tanggal OTW');
            $sheet->setCellValue('I1', 'Tanggal Proses');
            $sheet->setCellValue('J1', 'Tanggal Selesai');
            $sheet->setCellValue('K1', 'Respond Time');
            $sheet->setCellValue('L1', 'Travel Time');
            $sheet->setCellValue('M1', 'Recovery Time');
            $sheet->setCellValue('N1', 'Jenis Layanan');
            $sheet->setCellValue('O1', 'Keluhan');
            $sheet->setCellValue('P1', 'Tindakan');
            $sheet->setCellValue('Q1', 'PIC Progress');
            $sheet->setCellValue('R1', 'PIC Done');

            $no = 1;
            $x = 2;
            foreach ($data as $row) {
                $respon = explode(":", $row->respon);
                $travel = explode(":", $row->travel);
                $recovery = explode(":", $row->recovery);
                $date = new DateTime($row->tgllapor);
                $hasilrespon = $date->add(new DateInterval('PT' . intval($respon[0]) . 'H'  . intval($respon[1]) . 'M'));
                $tv = new DateTime($hasilrespon->format('Y-m-d H:i:s'));
                $hasiltravel = $tv->add(new DateInterval('PT' . intval($travel[0]) . 'H'  . intval($travel[1]) . 'M'));
                $rc = new DateTime($hasiltravel->format('Y-m-d H:i:s'));
                $hasilrecovery = $rc->add(new DateInterval('PT' . intval($recovery[0]) . 'H'  . intval($recovery[1]) . 'M'));
                // $hasiltravel = $date->add(new DateInterval('PT' . (intval($respon[0]) + intval($travel[0])) . 'H' . (intval($respon[1]) + intval($travel[1])) . 'M'));
                // $hasilrecovery =  $date->add(new DateInterval('PT' . (intval($respon[0]) + intval($travel[0]) + intval($recovery[0])) . 'H' . (intval($respon[1]) + intval($travel[1]) + intval($recovery[1])) . 'M'));



                $sheet->setCellValue('A' . $x, $no++);
                $sheet->setCellValue('B' . $x, "UP3 Pematangsiantar");
                $sheet->setCellValue('C' . $x, $row->namaulp);
                $sheet->setCellValue('D' . $x, $row->nip);
                $sheet->setCellValue('E' . $x, $row->nama);
                $sheet->setCellValue('F' . $x, "Done");
                $sheet->setCellValue('G' . $x, $row->tgllapor);
                $sheet->setCellValue('H' . $x, $hasilrespon->format('Y-m-d H:i:s'));
                $sheet->setCellValue('I' . $x, $hasiltravel->format('Y-m-d H:i:s'));
                $sheet->setCellValue('J' . $x, $hasilrecovery->format('Y-m-d H:i:s'));
                $sheet->setCellValue('K' . $x, $row->respon);
                // $spreadsheet->getActiveSheet()->getStyle('K' . $x)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('L' . $x,  $row->travel);
                // $spreadsheet->getActiveSheet()->getStyle('L' . $x)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('M' . $x,   $row->recovery);
                // $spreadsheet->getActiveSheet()->getStyle('M' . $x)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('N' . $x, $row->jenis);
                $sheet->setCellValue('O' . $x, $row->keluhan);
                $sheet->setCellValue('P' . $x, $row->tindakan);
                $sheet->setCellValue('Q' . $x, "IT SUPPORT UP3 PEMATANG SIANTAR");
                $sheet->setCellValue('R' . $x, $row->username . " - IT SUPPORT UP3 PEMATANG SIANTAR");
                $x++;
            }
            $writer = new Xlsx($spreadsheet);
            $filename = 'PosIT ' . $tgl1 . "sd" . $tgl2;

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }
    }
}
