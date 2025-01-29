// import AlumniController
const StudentController = require('../controllers/StudentController');

// import express
const express = require("express");

// membuat object router
const router = express.Router();

/**
 * Membuat routing
 */
router.get("/", (req, res) => {
  res.send("Hello Alumni API Express");
});

// Membuat routing alumni
router.get("/students", StudentController.index);
router.get("/students/:id", StudentController.show);
router.post("/students", StudentController.create);
router.put("/students/:id", StudentController.update);
router.delete("/students/:id", StudentController.delete);

// export router
module.exports = router;
