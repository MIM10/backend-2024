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
            })
        }
    }

    async delete(req, res) {
        try {
            const id = req.params.id;
            const student = await Student.delete(id);

            if (!student) {
                return res.status(404).json({ message: "Student tidak ditemukan" });
            }

            const data = {
                message: "Berhasil menghapus student dengan id = " + id
            }

            res.status(200).json(data);
        } catch (error) {
            res.status(500).json({
                message: "Gagal menghapus student",
            })
        }
    }
}

module.exports = new StudentController();