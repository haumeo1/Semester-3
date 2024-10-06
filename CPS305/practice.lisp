(defun convert-to-letter-grade (numeric-grade)
  (case (floor numeric-grade 10)
    (10 "A")
    (9 "A")
    (8 "B")
    (7 "C")
    (6 "D")
    (otherwise "F")))

(defun cal (x y func)
  (case func
    ('plus (+ x y))
    ('minus (- x y))
    ('div (/ x y))  
    )

  )

;; bank-account.lisp
(defvar *balance* 100)
(defun withdraw (amount)
  (if (> amount 1000)
      (print "Exceed limit")
      
      )
  (if (< amount 0)
      (print "Negative Amount")
      )
  
  
  (if (>= *balance* amount)
      (setf *balance* (- *balance* amount))
      (print "Insufficient funds"))
  *balance*)

(defun fact (x)
  (if (<= x 1)
      1
      (* x (fact (1- x)))
      )
  )
