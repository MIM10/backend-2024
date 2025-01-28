const Student = require('../models/Student');

class StudentController {
    async index(req, res) {
        const students = await Student.all();

        const data = {
            message: "Menampilkan semua student",
            data: students
        }

        res.json(data);
    }

    async show(req, res) {
        const id = req.params.id;
        const student = await Student.find(id);

        const data = {
            message: "Menampilkan student dengan id = " + id,
            data: student
        }

        res.json(data);
    }

    async create(req, res) {
        const student = await Student.create(req.body);

        const data = {
            message: "Berhasil menambahkan student",
            data: student
        }

        res.json(data);
    }
}

module.exports = new StudentController();