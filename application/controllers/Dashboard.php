<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Transactions';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('id', 'DESC');
        $data['transactions'] = $this->db->get('transactions')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function downloadTransactions()
    {
        $this->load->model('Export_model');
        $exportTransactions = $this->Export_model->ExportTransactions();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Time');
        $sheet->setCellValue('D1', 'Key');
        $sheet->setCellValue('E1', 'Driver');
        $sheet->setCellValue('F1', 'Description');
        $sheet->setCellValue('G1', 'Registration');
        $sheet->setCellValue('H1', 'Litres');

        $rows = 2;
        $no = 1;
        foreach ($exportTransactions as $et) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $et->trans_date);
            $sheet->setCellValue('C' . $rows, $et->trans_time);
            $sheet->setCellValue('D' . $rows, $et->driver_id);
            $sheet->setCellValue('E' . $rows, $et->driver_name);
            $sheet->setCellValue('F' . $rows, $et->vehicle_desc);
            $sheet->setCellValue('G' . $rows, $et->vehicle_number);
            $sheet->setCellValue('H' . $rows, $et->trans_volume);
            $rows++;
        }

        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="transactions.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save("php://output");
    }

    public function cleanliness()
    {
        $data['title'] = 'Cleanliness';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Dashboard_model');
        $data['cleanliness'] = $this->Dashboard_model->getCleanliness();
        //echo json_encode($this->Dashboard_model->getCleanliness());


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/cleanliness', $data);
        $this->load->view('templates/footer');
    }

    public function cleanlinessAutoload()
    {
        $this->load->model('Dashboard_model');
        echo json_encode($this->Dashboard_model->getCleanliness());
    }

    public function dataTablesBefore()
    {
        $data['title'] = 'Cleanliness';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('id', 'DESC');
        $data['cleanliness'] = $this->db->get('cleanliness')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/datatablesbefore', $data);
        $this->load->view('templates/footer');
    }

    public function downloadCleanlinessBefore()
    {
        $this->load->model('Export_model');
        $exportCleanliness = $this->Export_model->ExportCleanliness();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Time');
        $sheet->setCellValue('D1', 'Code 4um');
        $sheet->setCellValue('E1', 'Code 6um');
        $sheet->setCellValue('F1', 'Code 14um');
        $sheet->setCellValue('G1', 'Count 4um');
        $sheet->setCellValue('H1', 'Count 6um');
        $sheet->setCellValue('I1', 'Count 14um');
        $rows = 2;
        $no = 1;
        foreach ($exportCleanliness as $ec) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $ec->date);
            $sheet->setCellValue('C' . $rows, $ec->time);
            $sheet->setCellValue('D' . $rows, $ec->before_code_4um);
            $sheet->setCellValue('E' . $rows, $ec->before_code_6um);
            $sheet->setCellValue('F' . $rows, $ec->before_code_14um);
            $sheet->setCellValue('G' . $rows, $ec->before_count_4um);
            $sheet->setCellValue('H' . $rows, $ec->before_count_6um);
            $sheet->setCellValue('I' . $rows, $ec->before_count_14um);
            $rows++;
        }

        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="cleanliness-before.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save("php://output");
    }

    public function dataTablesAfter()
    {
        $data['title'] = 'Cleanliness';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('id', 'DESC');
        $data['cleanliness'] = $this->db->get('cleanliness')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/datatablesafter', $data);
        $this->load->view('templates/footer');
    }

    public function downloadCleanlinessAfter()
    {
        $this->load->model('Export_model');
        $exportCleanliness = $this->Export_model->ExportCleanliness();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Time');
        $sheet->setCellValue('D1', 'Code 4um');
        $sheet->setCellValue('E1', 'Code 6um');
        $sheet->setCellValue('F1', 'Code 14um');
        $sheet->setCellValue('G1', 'Count 4um');
        $sheet->setCellValue('H1', 'Count 6um');
        $sheet->setCellValue('I1', 'Count 14um');
        $rows = 2;
        $no = 1;
        foreach ($exportCleanliness as $ec) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $ec->date);
            $sheet->setCellValue('C' . $rows, $ec->time);
            $sheet->setCellValue('D' . $rows, $ec->after_code_4um);
            $sheet->setCellValue('E' . $rows, $ec->after_code_6um);
            $sheet->setCellValue('F' . $rows, $ec->after_code_14um);
            $sheet->setCellValue('G' . $rows, $ec->after_count_4um);
            $sheet->setCellValue('H' . $rows, $ec->after_count_6um);
            $sheet->setCellValue('I' . $rows, $ec->after_count_14um);
            $rows++;
        }

        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="cleanliness-after.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save("php://output");
    }

    public function dataTables()
    {
        $data['title'] = 'Filtration Records and Fuel Condition Monitoring';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('id', 'DESC');
        $data['cleanliness'] = $this->db->get('cleanliness')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/datatables', $data);
        $this->load->view('templates/footer');
    }

    public function downloadCleanliness()
    {
        $this->load->model('Export_model');
        $exportCleanliness = $this->Export_model->ExportCleanliness();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Time');
        $sheet->setCellValue('D1', 'B Code 4um');
        $sheet->setCellValue('E1', 'B Code 6um');
        $sheet->setCellValue('F1', 'B Code 14um');
        $sheet->setCellValue('G1', 'B Count 4um');
        $sheet->setCellValue('H1', 'B Count 6um');
        $sheet->setCellValue('I1', 'B Count 14um');
        $sheet->setCellValue('J1', 'A Code 4um');
        $sheet->setCellValue('K1', 'A Code 6um');
        $sheet->setCellValue('L1', 'A Code 14um');
        $sheet->setCellValue('M1', 'A Count 4um');
        $sheet->setCellValue('N1', 'A Count 6um');
        $sheet->setCellValue('O1', 'A Count 14um');
        $sheet->setCellValue('P1', 'DPT-1');
        $sheet->setCellValue('Q1', 'DPT-2');
        $sheet->setCellValue('R1', 'Filter Brand');
        $sheet->setCellValue('S1', 'Filter Type');
        $sheet->setCellValue('T1', 'Qty of Element');
        $sheet->setCellValue('U1', 'Element Price');
        $sheet->setCellValue('V1', 'Fuel Processed');
        $sheet->setCellValue('W1', 'Cost per Litre');

        $rows = 2;
        $no = 1;
        foreach ($exportCleanliness as $ec) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $ec->date);
            $sheet->setCellValue('C' . $rows, $ec->time);
            $sheet->setCellValue('D' . $rows, $ec->before_code_4um);
            $sheet->setCellValue('E' . $rows, $ec->before_code_6um);
            $sheet->setCellValue('F' . $rows, $ec->before_code_14um);
            $sheet->setCellValue('G' . $rows, $ec->before_count_4um);
            $sheet->setCellValue('H' . $rows, $ec->before_count_6um);
            $sheet->setCellValue('I' . $rows, $ec->before_count_14um);
            $sheet->setCellValue('J' . $rows, $ec->after_code_4um);
            $sheet->setCellValue('K' . $rows, $ec->after_code_6um);
            $sheet->setCellValue('L' . $rows, $ec->after_code_14um);
            $sheet->setCellValue('M' . $rows, $ec->after_count_4um);
            $sheet->setCellValue('N' . $rows, $ec->after_count_6um);
            $sheet->setCellValue('O' . $rows, $ec->after_count_14um);
            $sheet->setCellValue('P' . $rows, $ec->filter_housing1);
            $sheet->setCellValue('Q' . $rows, $ec->filter_housing2);
            $sheet->setCellValue('R' . $rows, $ec->filter_brand);
            $sheet->setCellValue('S' . $rows, $ec->filter_type);
            $sheet->setCellValue('T' . $rows, $ec->element_qty);
            $sheet->setCellValue('U' . $rows, $ec->element_price);
            $sheet->setCellValue('V' . $rows, $ec->fuel_processed);
            $sheet->setCellValue('W' . $rows, $ec->actual_cpl);
            $rows++;
        }

        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="cleanliness.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save("php://output");
    }

    public function vehicles()
    {
        $data['title'] = 'Vehicles';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('vehicle_id', 'DESC');
        $data['vehicles'] = $this->db->get('vehicles')->result_array();

        $this->form_validation->set_rules('vehicle_id', 'key', 'required');
        $this->form_validation->set_rules('vehicle_desc', 'description', 'required');
        $this->form_validation->set_rules('vehicle_name', 'name', 'required');
        $this->form_validation->set_rules('vehicle_number', 'registration', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dashboard/vehicles', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'vehicle_id' => $this->input->post('vehicle_id'),
                'vehicle_desc' => $this->input->post('vehicle_desc'),
                'vehicle_name' => $this->input->post('vehicle_name'),
                'vehicle_number' => $this->input->post('vehicle_number'),
                'vehicle_flag' => 3,
            ];
            $this->db->insert('vehicles', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! New vehicle has been added.</div>');
            redirect('dashboard/vehicles');
        }
    }

    public function editVehicle($id)
    {
        $data = [
            'vehicle_name' => htmlspecialchars($this->input->post('editName', true)),
            'vehicle_desc' => htmlspecialchars($this->input->post('editDesc', true)),
            'vehicle_number' => htmlspecialchars($this->input->post('editReg', true)),
            'vehicle_flag' => 2,
        ];

        $this->db->where('id', $id);
        $this->db->update('vehicles', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Vehicle has been updated.</div>');
        redirect('dashboard/vehicles');
    }

    public function deleteVehicle($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('vehicles');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Vehicle has been deleted.</div>');
        redirect('dashboard/vehicles');
    }

    public function drivers()
    {
        $data['title'] = 'Drivers';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('driver_id', 'DESC');
        $data['drivers'] = $this->db->get('drivers')->result_array();

        $this->form_validation->set_rules('driver_id', 'key', 'required');
        $this->form_validation->set_rules('driver_desc', 'description', 'required');
        $this->form_validation->set_rules('driver_name', 'name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dashboard/drivers', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'driver_id' => $this->input->post('driver_id'),
                'driver_desc' => $this->input->post('driver_desc'),
                'driver_name' => $this->input->post('driver_name'),
                'driver_flag' => 3,
            ];
            $this->db->insert('drivers', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! New driver has been added.</div>');
            redirect('dashboard/drivers');
        }
    }

    public function editDriver($id)
    {
        $data = [
            'driver_name' => htmlspecialchars($this->input->post('editName', true)),
            'driver_desc' => htmlspecialchars($this->input->post('editDesc', true)),
            'driver_flag' => 2,
        ];

        $this->db->where('id', $id);
        $this->db->update('drivers', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Driver has been updated.</div>');
        redirect('dashboard/drivers');
    }

    public function deleteDriver($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('drivers');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Driver has been deleted.</div>');
        redirect('dashboard/drivers');
    }

    public function tanks()
    {
        $data['title'] = 'Tanks';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/tanks', $data);
        $this->load->view('templates/footer');
    }
}


// flag => 0 === data from console
// flag => 1 === data sync to server
// flag => 2 === data edit from server
// flag => 3 === data from server
// flag => 4 === data sync to console
