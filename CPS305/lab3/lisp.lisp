(defstruct movie
  title director year type
  )
(defun num-movies (array)
  (let ((count 0))
    ;; Count the number of non-NIL entries in the array
    (dotimes (i (length array))
      (when (not (null (aref array i)))
        (incf count)))
    count))

