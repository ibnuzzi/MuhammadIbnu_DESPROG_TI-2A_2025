<?php
include('Model.php');
class BukuModel extends Model
{
    private $db;
    private $table = 'm_buku';

    public function __construct()
    {
        include_once('../lib/Connection.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (kategori_id, buku_kode, buku_nama, jumlah, deskripsi, gambar) VALUES(?,?,?,?,?,?)");
        // binding parameter ke query
        $query->bind_param('ississ', $data['kategori_id'], $data['buku_kode'], $data['buku_nama'], $data['jumlah'], $data['deskripsi'], $data['gambar']);
        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData()
    {
        // query untuk mengambil data dari tabel buku dengan join ke kategori
        return $this->db->query("SELECT b.*, k.kategori_nama 
                                FROM {$this->table} b 
                                LEFT JOIN m_kategori k ON b.kategori_id = k.kategori_id 
                                ORDER BY b.buku_id DESC");
    }

    public function getDataById($id)
    {
        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE buku_id = ?");
        // binding parameter ke query "i" berarti integer
        $query->bind_param('i', $id);
        // eksekusi query
        $query->execute();
        // ambil hasil query
        return $query->get_result()->fetch_assoc();
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} 
                                    SET kategori_id = ?, 
                                        buku_kode = ?, 
                                        buku_nama = ?, 
                                        jumlah = ?, 
                                        deskripsi = ?, 
                                        gambar = ? 
                                    WHERE buku_id = ?");
        // binding parameter ke query
        $query->bind_param('ississi', $data['kategori_id'], $data['buku_kode'], $data['buku_nama'], $data['jumlah'], $data['deskripsi'], $data['gambar'], $id);
        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE buku_id = ?");
        // binding parameter ke query
        $query->bind_param('i', $id);
        // eksekusi query
        $query->execute();
    }

    public function getKategoriList()
    {
        // query untuk mengambil daftar kategori
        return $this->db->query("SELECT kategori_id, kategori_nama FROM m_kategori ORDER BY kategori_nama ASC");
    }
}
