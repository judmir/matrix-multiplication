<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Matrix Multiplication</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: "Source Sans Pro";
            font-weight: normal;
        }

        @font-face {
            font-family: "Vesper Libre";
            font-weight: normal;
        }

        .f1gjq9tk {
            padding: 2px;
            position: relative
        }

        .ft2xw1y {
            background-color: #323232;
            bottom: 0;
            left: 0;
            position: absolute;
            top: 0;
            width: 2px
        }

        .ft2xw1y::before {
            background-color: #323232;
            content: '';
            height: 2px;
            left: 0;
            position: absolute;
            top: 0;
            width: 9px
        }

        .ft2xw1y::after {
            background-color: #323232;
            bottom: 0;
            content: '';
            height: 2px;
            left: 0;
            position: absolute;
            width: 9px
        }

        .fltbfb1 {
            background-color: #323232;
            bottom: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: 2px
        }

        .fltbfb1::before {
            background-color: #323232;
            content: '';
            height: 2px;
            position: absolute;
            right: 0;
            top: 0;
            width: 9px
        }

        .fltbfb1::after {
            background-color: #323232;
            bottom: 0;
            content: '';
            height: 2px;
            position: absolute;
            right: 0;
            width: 9px
        }

        .ftsota9 {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: 0;
            padding: 0
        }

        .fnvluvl {
            background-color: rgba(255, 255, 255, 0);
            border: none;
            color: #323232;
            display: block;
            font-family: 'Source Sans Pro', sans-serif;
            height: 48px;
            line-height: 49px;
            padding: 0;
            text-align: center;
            text-indent: 0;
            width: 48px
        }

        input.fnvluvl:hover, input.fnvluvl:focus {
            box-shadow: inset 0px 1px 2px 0px rgba(0, 0, 0, 0.5)
        }

        .f1iggx8q {
            font-size: 24px
        }

        .f1rgqaj2 {
            font-size: 20px
        }

        .fjtfooa {
            font-size: 17px
        }

        .f1337cvc {
            font-size: 15px
        }

        .fstp1ym {
            font-size: 13px
        }

        .f1c3gq5o {
            font-size: 11px
        }

        .f1lwqo49 {
            margin-bottom: 100px;
            margin-top: 200px
        }

        .f1c7x5pa {
            align-items: center;
            display: flex;
            justify-content: center
        }

        .fm8khm7 {
            border-spacing: 0
        }

        .f1ipeskn {
            transition: opacity 880ms
        }

        .fakm5g {
            position: relative;
            transition-delay: 300ms;
            transition-duration: 700ms;
            transition-property: opacity, margin-left
        }

        .frd1ucg {
            position: relative;
            transition-delay: 0ms;
            transition-duration: 0ms;
            transition-property: opacity, margin-left
        }

        .f4auwvp {
            color: #686868;
            font-size: 24px;
            transition-delay: 700ms, 300ms, 300ms;
            transition-duration: 700ms;
            transition-property: opacity, width, margin
        }

        .fubg18a {
            transition-delay: 250ms;
            transition-duration: 400ms;
            transition-property: opacity, color, transform
        }

        .f17ypkw1 {
            left: 3px;
            position: absolute;
            top: 3px
        }

        .f1jpfx8j {
            transform: scale(0.6);
            transition: opacity 300ms ease 250ms
        }

        .f6eymyj::after {
            border: none;
            color: #323232;
            content: "+";
            display: block;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 24px;
            height: 2em;
            left: 40px;
            line-height: 49px;
            padding: 0;
            position: absolute;
            text-align: center;
            text-indent: 0;
            top: 0;
            width: 2em
        }

        .f1uaugap {
            align-items: center;
            background-image: linear-gradient(to bottom,
            rgba(255, 255, 255, 0) 0,
            rgba(255, 255, 255, 0.8) 92px,
            rgba(255, 255, 255, 0.8) 126px,
            rgba(255, 255, 255, 0) 100%);
            display: flex;
            justify-content: center;
            padding-bottom: 40px;
            padding-top: 86px;
            position: relative;
            z-index: 2
        }

        .f1uaugap > * + * {
            margin-left: 8px
        }

        .f192eym {
            background-color: #C5C5C5;
            border: none;
            color: #FFFFFF;
            font-size: 24px;
            padding: 8px 16px
        }

        .flk4j4b {
            background-color: rgb(48, 141, 255);
            border: none;
            box-shadow: 0 1px 1px 0 #C5C5C5;
            color: #FFFFFF;
            cursor: pointer;
            font-size: 24px;
            padding: 8px 16px
        }

        .flk4j4b:hover {
            background-color: rgb(93, 166, 252)
        }

        .fljzbrb {
            background-color: rgb(255, 162, 48);
            border: none;
            box-shadow: 0 1px 1px 0 #C5C5C5;
            color: #FFFFFF;
            cursor: pointer;
            font-size: 24px;
            padding: 8px 16px
        }

        .f192eym > svg, .flk4j4b > svg, .fljzbrb > svg {
            margin-bottom: -2px;
            margin-right: 8px
        }

        .fljzbrb:hover {
            background-color: rgb(253, 180, 97)
        }

        .f1qv28t9 {
            color: #686868;
            font-size: 24px;
            margin: 1em
        }

        .f11qpndz {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 0 10px;
            z-index: 3
        }

        .f1mgyl9u {
            position: relative
        }

        .f17pqfye {
            display: flex;
            flex-direction: row;
            justify-content: center;
            left: -20px;
            margin: 10px 0;
            min-width: 76px;
            position: absolute;
            right: -20px;
            z-index: 3
        }

        .ffnnz8g {
            background-color: rgba(0, 0, 0, 0);
            border: none;
            box-shadow: 0 1px 1px 0 #C5C5C5;
            color: #686868;
            cursor: pointer;
            font-size: 20px;
            height: 30px;
            line-height: 30px;
            margin: 4px;
            text-align: center;
            width: 30px
        }

        .ffnnz8g:hover {
            background-color: #EEEEEE
        }

        body {
            color: #323232;
            font-family: "Source Sans Pro", serif;
            font-weight: 400;
            margin: 0
        }

        .fq5xi0j {
            background-image: linear-gradient(to bottom, white 0, rgba(255, 255, 255, 0.9) 60%, rgba(255, 255, 255, 0) 100%);
            font-family: "Vesper Libre", serif;
            font-weight: 400;
            left: 0;
            margin: 0;
            padding-bottom: 3rem;
            padding-top: 1.5rem;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            z-index: 10
        }

        .flg8p5s {
            bottom: 0;
            font-family: "Source Sans Pro", serif;
            font-size: 14px;
            left: 0;
            position: fixed;
            right: 0;
            text-align: center;
            z-index: -10
        }

        .flg8p5s > * {
            color: #C5C5C5
        }
    </style>
</head>
<body class="antialiased">
<!-- Design idea from http://matrixmultiplication.xyz/ -->
<div id="main-container">
    <div class="app" id ="app">
        <h1 class="title fq5xi0j">Matrix Multiplication</h1>
        <div class="calculator f1lwqo49">
            <div class="matrices f1c7x5pa">
                <matrix-a-component></matrix-a-component>
                <span class="tempEqualsSign f1qv28t9">×</span>
                <matrix-b-component></matrix-b-component>
                <div class="matrixC frd1ucg" style="opacity: 0.01; margin-left: 0px;"></div>
            </div>
            <div class="controlPanel f1uaugap">
                <div class="multiply flk4j4b">
                    <svg width="20px" height="20px" viewBox="0 0 41.999 41.999" space="preserve">
                        <g>
                            <path d="M36.068,20.176l-29-20C6.761-0.035,6.363-0.057,6.035,0.114C5.706,0.287,5.5,0.627,5.5,0.999v40 c0,0.372,0.206,0.713,0.535,0.886c0.146,0.076,0.306,0.114,0.465,0.114c0.199,0,0.397-0.06,0.568-0.177l29-20  c0.271-0.187,0.432-0.494,0.432-0.823S36.338,20.363,36.068,20.176z"
                                  fill="#FFFFFF"></path>
                        </g>
                    </svg>
                    Multiply
                </div>
            </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
