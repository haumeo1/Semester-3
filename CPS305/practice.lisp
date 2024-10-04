(defun convert-to-letter-grade (numeric-grade)
(case (floor numeric-grade 10)
(10 "A")
(9 "A")
(8 "B")
(7 "C")
(6 "D")
(otherwise "F")))
