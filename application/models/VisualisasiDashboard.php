<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VisualisasiDashboard extends CI_Model
{

    function countRataUsiaSuami()
    {
        $this->db->select('count(dp.usia_suami) as rata_suami, dp.usia_suami');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_pasangan dp', 'dp.id_pasangan = ftp.id_pasangan', 'left');
        $this->db->group_by('dp.usia_istri');
        return $this->db->get()->result();
    }

    function countRataUsiaIstri()
    {
        $this->db->select('count(ftp.id_tingkat_perceraian) as rata_istri');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_pasangan dp', 'dp.id_pasangan = ftp.id_pasangan', 'left');
        $this->db->group_by('dp.usia_istri');
        return $this->db->get()->result();
    }

    function perkaraPerceraian($jenis_perkara)
    {
        $this->db->select('count(ftp.id_tingkat_perceraian) as total_jenis_perkara, dw.tahun');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_jenis_perkara djp', 'djp.id_jenis_perkara = ftp.id_jenis_perkara', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->group_by('dw.tahun');
        $this->db->where('djp.jenis_perkara', $jenis_perkara);
        return $this->db->get()->result();
    }

    function penyebabPerceraianPertahun()
    {
        $this->db->select('dw.tahun');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_faktor_penyebab_perceraian dp', 'dp.id_faktor_penyebab_perceraian = ftp.id_faktor_penyebab_perceraian', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->group_by('dw.tahun');
        return $this->db->get()->result();
    }

    function penyebabPerceraian($penyebab, $tahun)
    {
        $this->db->select('dw.tahun, count(ftp.id_tingkat_perceraian) as total_penyebab');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_faktor_penyebab_perceraian dp', 'dp.id_faktor_penyebab_perceraian = ftp.id_faktor_penyebab_perceraian', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        // $this->db->group_by('dw.tahun');
        $this->db->where('dp.faktor_penyebab_perceraian', $penyebab);
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }

    function penyebabPerceraian1($tahun)
    {
        $this->db->select('dw.tahun, dp.faktor_penyebab_perceraian, count(ftp.id_tingkat_perceraian) as total_penyebab');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_faktor_penyebab_perceraian dp', 'dp.id_faktor_penyebab_perceraian = ftp.id_faktor_penyebab_perceraian', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->group_by('dp.faktor_penyebab_perceraian');
        // $this->db->where('dp.faktor_penyebab_perceraian', $penyebab);
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }

    function dataPerceraian()
    {
        $this->db->select('dw.tahun, count(ftp.id_tingkat_perceraian) as total_penyebab');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->group_by('dw.tahun');
        return $this->db->get()->result();
    }

    function dataPerceraianUsia()
    {
        $this->db->select('dw.tahun, count(ftp.id_tingkat_perceraian) as total_penyebab');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->join('dim_pasangan dp', 'dp.id_pasangan = ftp.id_pasangan', 'left');
        $this->db->group_by('dw.tahun');
        return $this->db->get()->result();
    }

    function PerceraianBerdasarkanUsiaSuami($usia_suami, $tahun)
    {
        $this->db->select('dw.tahun, dp.usia_suami, count(ftp.id_tingkat_perceraian) as total_penyebab');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_pasangan dp', 'dp.id_pasangan = ftp.id_pasangan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->where('dp.usia_suami', $usia_suami);
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }

    function getPenyebabPerceraianPerkecamatan()
    {
        $this->db->select('count(ftp.id_tingkat_perceraian) as total_penyebab, dw.tahun, ftp.id_faktor_penyebab_perceraian, dfp.faktor_penyebab_perceraian');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_lokasi dl', 'dl.id_lokasi = ftp.id_lokasi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->join('dim_faktor_penyebab_perceraian dfp', 'dfp.id_faktor_penyebab_perceraian = ftp.id_faktor_penyebab_perceraian', 'left');
        $this->db->group_by('dw.tahun');
        // $this->db->where('dfp.id_faktor_penyebab_perceraian', $id_penyebab);
        return $this->db->get()->result();
    }

    function getPenyebabPerceraianPerPenyebabPerkecamatan($tahun, $faktor_penyebab, $id_lokasi)
    {
        $this->db->select('count(ftp.id_tingkat_perceraian) as total, dw.tahun');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_lokasi dl', 'dl.id_lokasi = ftp.id_lokasi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->join('dim_faktor_penyebab_perceraian dfp', 'dfp.id_faktor_penyebab_perceraian = ftp.id_faktor_penyebab_perceraian', 'left');
        $this->db->where('dw.tahun', $tahun);
        $this->db->where('dfp.faktor_penyebab_perceraian', $faktor_penyebab);
        $this->db->where('dl.id_lokasi', $id_lokasi);
        return $this->db->get()->result();
    }

    function getPenyebabPerceraian($tahun, $id_lokasi)
    {
        $this->db->select('dfp.faktor_penyebab_perceraian, count(ftp.id_tingkat_perceraian) as total');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_lokasi dl', 'dl.id_lokasi = ftp.id_lokasi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->join('dim_faktor_penyebab_perceraian dfp', 'dfp.id_faktor_penyebab_perceraian = ftp.id_faktor_penyebab_perceraian', 'left');
        $this->db->group_by('ftp.id_faktor_penyebab_perceraian');
        $this->db->where('dw.tahun', $tahun);
        $this->db->where('dl.id_lokasi', $id_lokasi);
        return $this->db->get()->result();
    }

    function getFaktorPenyebabPerceraian()
    {
        $this->db->select('*');
        $this->db->from('dim_faktor_penyebab_perceraian');
        $this->db->order_by('id_faktor_penyebab_perceraian', 'desc');
        return $this->db->get()->result();
    }

    function getKecamatan()
    {
        $this->db->select('*');
        $this->db->from('dim_lokasi');
        $this->db->order_by('id_lokasi', 'desc');
        return $this->db->get()->result();
    }
    function getKecamatanById($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('dim_lokasi');
        $this->db->where('id_lokasi', $id_lokasi);
        return $this->db->get()->result();
    }

    function getKPIPerceraian()
    {
        $this->db->select('count(ftp.id_tingkat_perceraian) as capaian, kp.nilai_target, dw.tahun');
        $this->db->from('fact_tingkat_perceraian ftp');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = ftp.id_waktu', 'left');
        $this->db->join('kpi_perceraian kp', 'kp.tahun = dw.tahun', 'left');
        $this->db->group_by('dw.tahun');
        return $this->db->get()->result();
    }


    public function addDataKpiPerceraian($data)
    {
        $this->db->insert('kpi_perceraian', $data);
        return $this->db->affected_rows() > 0 ? $this->db->insert_id() : FALSE;
    }

    function delete_kpiPerceraian($id)
    {
        $this->db->where('id_kpi_perceraian', $id);
        $this->db->delete('kpi_perceraian');
    }

    function getAllKPI()
    {
        $this->db->select('*');
        $this->db->from('kpi_perceraian');
        $this->db->order_by('id_kpi_perceraian', 'desc');
        return $this->db->get()->result();
    }

    function getKPIByTahun($tahun)
    {
        $this->db->select('*');
        $this->db->from('kpi_perceraian');
        $this->db->order_by('id_kpi_perceraian', 'desc');
        $this->db->where('tahun', $tahun);
        return $this->db->get()->result();
    }
}

/* End of file VisualisasiDashboard.php */
