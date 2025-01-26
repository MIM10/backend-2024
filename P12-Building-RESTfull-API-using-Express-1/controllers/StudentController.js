const Student = require('../models/Student');

class StudentController {
    index(req, res) {
        const students = Student.all();

        Student.all((student) => {
            const data = {
                message: "Menampilkan semua student",
                data: student
            }
    
            res.json(data);
        });
    }
}

module.exports = new StudentController();