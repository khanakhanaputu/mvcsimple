<?php
getFile("core/database.php");
class Model extends Database
{
    public function __construct()
    {
        // Inisialisasi koneksi database atau resource lain di sini
        parent::__construct();
    }
    public function getAll($table)
    {
        // Ambil semua data dari tabel
        $query = "SELECT * FROM $table";
        $hasil = mysqli_query($this->connect, $query);
        $data = [];
        if (mysqli_num_rows($hasil) > 0) {
            while ($row = mysqli_fetch_assoc($hasil)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getById($table, $field, $id)
    {
        // Ambil satu data berdasarkan ID
        $query = "SELECT * FROM $table WHERE $field='$id'";
        $result =  mysqli_query($this->connect, $query);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return "data not found";
        }
    }

    public function create($table, ...$data)
    {
        try {
            foreach ($data as $rows) {
                $datanya = implode(",", $rows);
                $query = "INSERT INTO $table VALUES (" . $datanya . ")";
            }
            mysqli_query($this->connect, $query);
        } catch (\Throwable $th) {
            echo "erro mass";
        }
    }

    public function update($table, $field, $data, $target, $target_value)
    {
        // Update data berdasarkan ID
        $query = "UPDATE $table SET $field='$data' WHERE $target='$target_value'";
        $result = mysqli_query($this->connect, $query);
        if (!$result) {
            return "error";
        }
    }

    public function delete($table, $target, $target_value)
    {
        // Hapus data berdasarkan ID
        $query = "DELETE * FROM $table WHERE $target='$target_value'";
        $result = mysqli_query($this->connect, $query);
        if (!$result) {
            echo "error";
        }
    }
}
