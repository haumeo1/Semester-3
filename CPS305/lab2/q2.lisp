;; Type this code, as is, in your lab02-ans.lisp file.
;; DO NOT MODIFY THIS CODE
(defparameter *events* (list))

(defun roll-dice ()
  (let* ((s1 (1+ (random 6)))
         (s2 (1+ (random 6)))
         (sum (+ s1 s2)))
    (push (list sum s1 s2) *events*)
    sum))

(defun simulate-dice-rolls (n)
  "Simulates rolling a pair of dice n times and returns the count of how many times the next sum is greater than the previous sum, with a final decrement."
  (let ((count 0)       
        (previous-sum 0)) 
    (dotimes (i n)       ;; Loop n times
      (let ((current-sum (roll-dice)))
        (when (> current-sum previous-sum)
          (incf count))                       ;; Increment the count if true
        (setf previous-sum current-sum)))    
    (decf count)                           
    count))                                 



(defun execute-experiment (n)
  "This function implements a simple interface for analyzing the
   operation of function SIMULATE-DICE-ROLLS"
  (setf *events* (list))
  (let ((res (simulate-dice-rolls n)))
    (format t "simulate-dice-rolls returned: ~a~%(Sum Dice1 Dice2) values: ~a~%" res (reverse *events*))))
