const Student = require('../models/Student');

class StudentController {
    index(req, res) {
        const students = Student.all();

        const data = {
            message: "Mmenampilkan semua student",
            data: students
        }

        res.json(data);
    }
}