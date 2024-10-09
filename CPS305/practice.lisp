(defun add-movie (movie array)
  (let* ((title (movie-title movie))   ; Get the title of the movie
         (found nil)                   ; Initialize a variable to track if the movie exists
         (length (length array)))       ; Get the length of the array
    ;; Loop through the array to check if the movie exists or find an empty slot
    (dotimes (i length)
      ;; If the slot is not empty and the title matches, set `found` to true
      (when (and (not (null (aref array i))) 
                 (string= (movie-title (aref array i)) title))
        (setf found t)))
    ;; If the movie is found or array is full, return NIL
    (if (or found (not (find NIL array)))
        NIL
      ;; Otherwise, find the first empty slot and add the movie
      (setf (aref array (position NIL array)) movie)
      array)))

