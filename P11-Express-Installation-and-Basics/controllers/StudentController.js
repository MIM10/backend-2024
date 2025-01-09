// TODO 3: Import data students dari folder data/students.js
const student = require("../data/students")

// membuat Class StudentController
class StudentController {
    index(req, res) {
      // TODO 4: Tampilkan data students
      const data = {
        message: "Menampilkan semua students",
        data: student
      }

      res.json(data)
    }
    
    // store(req, res) {
    //     // TODO 5: Tambahkan data students
    //     const { nama } = req.body;

    //     student.push(nama);

    //     const data = {
    //         message: `Menambahkan data students: ${nama}`,
    //         data: student
    //     }

    //     res.json(data)
    // }
    
    store(req, res) {
        const { nama } = req.body;
    
        // Pastikan `nama` selalu berupa array sebelum digabungkan ke `student`
        const namaArray = Array.isArray(nama) ? nama : [nama];
        student.push(...namaArray);
    
        const data = {
            message: `Menambahkan data students: ${namaArray.join(", ")}`,
            data: student
        };
    
        res.json(data);
    }

    update(req, res) {
        // TODO 6: Update data students
        const { id } = req.params;
        const { nama } = req.body;
        
        const index = id - 1; // mengurangi 1 agar sesuai dengan index array

        if (index >= 0 && index < student.length) {
            const oldName = student[index];
            student[index] = nama; // Update data

            const data = {
                message: `Mengupdate student dengan ID ${id}: ${oldName} -> ${nama}`,
                data: student
            };

            res.json(data);
        } else {
            res.status(404).json({ message: "ID student tidak ditemukan" });
        }
    }
    
    destroy(req, res) {
        // TODO 7: Hapus data students
        const { id } = req.params;

        const index = id - 1; // mengurangi 1 agar sesuai dengan indeks array

        if (index >= 0 && index < student.length) {
            const nama = student.splice(index, 1); // Hapus data berdasarkan indeks

            const data = {
                message: `Menghapus student dengan ID ${id}: ${nama}`,
                data: student
            };

            res.json(data);
        } else {
            res.status(404).json({ message: "ID student tidak ditemukan" });
        }
    }
  }
  
  // membuat object StudentController
  const object = new StudentController();
  
  // meng-export object StudentController
  module.exports = object;