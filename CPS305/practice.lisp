(defstruct movie
title director year type
  )
(defun add-movie (movie array)
  (let ((length (length array))
        (found NIL)
        (spot NIL)
        )
    (dotimes (i length)
      (let ((current (aref array i)))
        (when (and (not spot) (null current))
          (setf spot i)
          )
        (when (and current (string= (movie-title current) (movie-title movie))) 
          (setq found t)
          )        
        )
      )
    (if (or found (not spot))
        NIL
        (setf (aref array spot) movie)
        )  
    )

  )
;delete function
(defun delete-movie (title array)
  (let ((length (length array))
        (found nil)
        )
    (dotimes (i length)
      (let ((current (aref array i) ))
        (when (and current (string= title (movie-title current)))
          (setq found t)
          (setf (aref array i) nil)
          )    
        )
      )
    (if (not found)
        NIL
        array
        )
    )
  )
;number of movies
(defun num-movies (array)
  (let ((count 0)
        (length (- (length array) 1))
        ) 
    (dotimes (i length (when (null (aref array i)) (return)))
      (if (aref array i)
          (incf count)
          )
      )
    count
    )
  )

(defstruct person
  name
  age
  )

(defun filter-ages (vector number)
  (let ((arr (make-array 0 :adjustable t :fill-pointer 0))
        (length (length vector))
        )
    (dotimes (i length)
      (let ((current (aref vector i)))
        (when (and current (> (person-age current) number))
          (vector-push-extend (person-name current) arr)
          )
        )
      )
    arr
    )
  )

(defun array-group (array1 array2)
  (let* ((length1 (length array1))   ; Length of the first array
         (length2 (length array2))   ; Length of the second array
         (max-length (max length1 length2))  ; Maximum length of the two arrays
         ;; Create a result array of size `max-length` with 2 columns
         (result (make-array `(,max-length ,max-length))))
    ;; Loop through each index up to `max-length`
    (dotimes (i max-length)
      (cond
        ;; If index `i` is beyond the length of array2, fill in NIL for array2
        ((>= i length2)
         (setf (aref result i 0) (aref array1 i))  ; Add element from array1
         (setf (aref result i 1) nil))             ; NIL for array2
        ;; If index `i` is beyond the length of array1, fill in NIL for array1
        ((>= i length1)
         (setf (aref result i 0) nil)              ; NIL for array1
         (setf (aref result i 1) (aref array2 i))) ; Add element from array2
        ;; If both arrays have elements, add both
        (t
         (setf (aref result i 0) (aref array1 i))  ; Add element from array1
         (setf (aref result i 1) (aref array2 i)))))  ; Add element from array2
    ;; Return the result array
    result))

(defun check-cond (arr)
  (let ((length (length arr)))
    (dotimes (i length)
      (cond
        ((= i 2)
         (print "2")
         )
        )
      )
    )
  )

(defun appear (arr number)
  (let ((count 0)
        (length (length arr))
        )
    (dotimes (i length)
      (when (= number (aref arr i))
        (incf count)
        )
      )
    count
    )

  )
(defun return-max (arr)
  (let ((count (make-hash-table))
        (length (length arr))
        )
    (dotimes (i length)
      (incf (gethash (aref arr i) count 0))
      )
    )
  )

(defun sum-square (number)
  (let ((result 0))
    (dotimes (i (+ 1 number))
      (setq result (+ result (* i i)))
      )
    result
    )
  
  )

(defun test-cond (arr)
 (let ((count 0)
       (count1 0)
       (length (length arr))
       )
   (dotimes (i length)
     (cond
       ((<= (aref arr i) 2)
        (incf count)
        )
       (t
        (incf count1)
        )
       )
     )
   (list count count1)
   )
  )



(defun count01 (arr)
  "Returns a vector of lists where each list contains an element from the array and its count."
  (let ((count (make-hash-table))  ; To store the frequency of each element
        (length (length arr)))     ; The length of the input array
    ;; Count occurrences of each element in the array
    (dotimes (i length)
      (let ((elem (aref arr i)))   ; Get the element at index i
        (incf (gethash elem count 0)))) ; Increment its count in the hash table
    
    ;; Collect the keys from the hash table using loop
    (let ((keys (loop for key being the hash-keys of count collect key)))
      ;; Map the hash table to a vector of lists (element count)
      (map 'vector (lambda (key)
                     (list key (gethash key count)))
           keys))))

(defun double-list (ls)
 (let
     ((result nil))
   (dolist (x ls)
     (push (* x x) result)
       )
   (nreverse result)
     )
  )

;implement linked-list
(defstruct node
  data next
  )
(defstruct linked-list
  head size
  )
(defun 1-ele (alist)
  (node-data (linked-list-head alist))
  )
(defun add-ele (value alist)
  (make-linked-list :head (make-node :data value :next (linked-list-head alist))
                    :size (1+ (linked-list-size alist))
                    )
  )
(defun my-cdr (alist)
  (make-linked-list :head (node-next (linked-list-head alist))
                    :size (1- (linked-list-size alist))
                    )
  
  )
(defun print-ls (alist)
  (loop while (not (null (linked-list-head alist))) do
         (format t "~a~%" (node-data (linked-list-head alist)))
         (setf alist (my-cdr alist))
         )
  )

(defun largest-ls (alist)
  (let ((maximum 0))
    (dolist (x alist maximum)
      (if (> x maximum)
          (setf maximum x)
          (continue)
          )
      )
    maximum
    )
  )

(defun try ()
  (dotimes (i 5)
    (print i)
    )
  )
