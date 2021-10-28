<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
    /**
     * save siswa
     * String @param array
     */
    public function save($data)
    {
        return $this->db->insert('siswa', $data);
    }

    /**
     * delete kelas
     */
    public function delete($id)
    {
        return $this->db->delete('siswa', ['siswa_id' => $id]);
    }


    //Query Datatable loaded
    function getSiswa($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        $searchKelas = $postData['searchKelas'];

        ## Search 
        $search_arr = array();
        $searchQuery = "";

        if ($searchValue != '') {
            $search_arr[] = " (siswa_nama like '%" . $searchValue . "%' or 
                siswa_nis like '%" . $searchValue . "%' or 
                siswa_telepon like'%" . $searchValue . "%' ) ";
        }

        if ($searchKelas != '') {
            $search_arr[] = " kelas_id='" . $searchKelas . "' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('siswa')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('siswa')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('siswa')->result();

        $data = array();

        $no = 1;
        foreach ($records as $jval) {
            $id = $jval->siswa_id;
            $nama = $jval->siswa_nama;
            if ($this->session->userdata('role') == 55) :
                $data[] = array(
                    'siswa_id' =>  $no++,
                    'siswa_nis' => $jval->siswa_nis,
                    'siswa_nama' => $jval->siswa_nama,
                    'created_at' => date("d F Y", strtotime($jval->created_at)),
                    'updated_at' => date("H:i", strtotime($jval->created_at)) . ' WIT',
                    'aksi'  => '<a href="#" class="btn btn-danger btn-sm text-white link laporkan-mod" onclick="openModal(' . "'" . $id . ',' . $nama . "'" . ')" data-toggle="modal"><i class="fa fa-gavel"></i> Laporkan</a>'
                );
            endif;
            if ($this->session->userdata('role') == 99) :
                $data[] = array(
                    'siswa_id' =>  $no++,
                    'siswa_nis' => $jval->siswa_nis,
                    'siswa_nama' => $jval->siswa_nama,
                    'created_at' => date("d F Y", strtotime($jval->created_at)),
                    'updated_at' => date("H:i", strtotime($jval->created_at)) . ' WIT',
                    'aksi'  => '<a href="javascript:void(0)" onclick="hapus(' . "'" . $jval->siswa_id . "'" . ')" class="btn btn-danger btn-sm text-white link"><i class="fa fa-trash"></i></a>'
                );
            endif;
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    //!--End of Query datatable loaded
}

/* End of file SiswaModel.php */
