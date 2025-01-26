const Student = require('../models/Student');

class StudentController {
    async index(req, res) {
        const students = await Student.all();

        const data = {
            message: "Menampilkan semua student",
            data: students
        }

        res.json(data);
        // Student.all((student) => {
        // });
    }
}

module.exports = new StudentController();