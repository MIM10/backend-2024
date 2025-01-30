const Student = require('../models/Student');

class StudentController {
    async index(req, res) {
        try {
            const students = await Student.all();

            const data = {
                message: "Menampilkan semua student",
                data: students
            }

            res.status(200).json(data);
        } catch (error) {
            res.status(500).json({
                message: "Gagal menampilkan student",
                error: error.message
            });
        }
    }

    async show(req, res) {
        try {
            const id = req.params.id;
            const student = await Student.find(id);

            const data = {
                message: "Menampilkan student dengan id = " + id,
                data: student
            }

            res.status(200).json(data);
        } catch (error) {
            res.status(404).json({
                message: "Gagal menampilkan student",
                error: error.message
            });
        }
    }

    async create(req, res) {
        try {
            const student = await Student.create(req.body);

            const data = {
                message: "Berhasil menambahkan student",
                data: student
            }

            res.status(201).json(data);
        } catch (error) {
            res.status(500).json({
                message: "Gagal menambahkan student",
                error: error.message
            })
        }
    }

    async update(req, res) {
        try {
            const id = req.params.id;
            const student = await Student.update(id, req.body);

            if (!student) {
                return res.status(404).json({ message: "Student tidak ditemukan" });
            }

            const data = {
                message: "Berhasil mengubah student dengan id = " + id,
                data: student
            }

            res.status(200).json(data);
        } catch (error) {
            res.status(500).json({
                message: "Gagal mengubah student",
                error: error.message
            })
        }
    }

    async delete(req, res) {
        try {
            const id = req.params.id;
            const result = await Student.delete(id);

            if (result.affectedRows === 0) {
                return res.status(404).json({ message: "Student tidak ditemukan" });
            }

            res.status(200).json({
                message: "Berhasil menghapus student dengan id = " + id,
                delete_data: result
            });
        } catch (error) {
            res.status(500).json({
                message: "Gagal menghapus student",
                error: error.message
            })
        }
    }
}

module.exports = new StudentController();