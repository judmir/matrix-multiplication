<p align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Matrix_multiplication_qtl1.svg/620px-Matrix_multiplication_qtl1.svg.png" width="400"></p>

## Matrix Multiplication API Laravel
### 	Definition

In mathematics, particularly in linear algebra, matrix multiplication is a binary operation that produces a matrix from two matrices. For matrix multiplication, the number of columns in the first matrix must be equal to the number of rows in the second matrix. The resulting matrix, known as the matrix product, has the number of rows of the first and the number of columns of the second matrix.

Matrix multiplication was first described by the French mathematician Jacques Philippe Marie Binet in 1812, to represent the composition of linear maps that are represented by matrices. Matrix multiplication is thus a basic tool of linear algebra, and as such has numerous applications in many areas of mathematics, as well as in applied mathematics, statistics, physics, economics, and engineering. Computing matrix products is a central operation in all computational applications of linear algebra.

## Installation
```
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

## How to use API

```
POST api/matrix-multiplication
{
    "matrixA":[
        [1,2,3],
        [1,2,3]
    ],
    "matrixB":[
        [1,2,3],
        [1,2,3],
        [1,2,3]
    ]
}
```


## The API returns the following result:
> The resulting matrix is containing characters rather than numbers - similar to excel columns. 
> 
> Examples: 1 => A, 26 => Z, 27 => AA, 28 => AB.
```
[
    [
        "F",
        "L",
        "R"
    ],
    [
        "F",
        "L",
        "R"
    ]
]
```

## CURL usage
```
curl --location --request POST 'http://127.0.0.1:8000/api/matrix-multiplication' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Cookie: XSRF-TOKEN=ljiNtZpZvoLOmBEzdfVQbRjTGmFihBMDtcqCBN37; laravel_session=rc4bTLWhU979oELD6SDAP13cc7oXsIszKHNAlbfG' \
--data-raw '{
   "matrixA":[
       [1,2,3],
       [1,2,3]
   ],
   
   "matrixB":[
       [1,2,3],
       [1,2,3],
       [1,2,3]
   ]
}'
```
> #### TODO!
>
> - Build frontend (VueJS), consuming API
>
