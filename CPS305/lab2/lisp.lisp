(defun GPA (a)
  (cond
    ((>= a 90)
     ())
    ((and (< a 90) (>= a 85))
     (A))
    (t  ;; Add a default case for other grades if needed
     (Below A))
  ))

