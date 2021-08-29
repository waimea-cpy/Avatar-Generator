<?php

$id = isset( $_GET['id'] ) ? $_GET['id'] : 'NOID';
$hash = md5( $id );

$imgStart = '<?xml version="1.0" encoding="utf-8"?>
             <svg viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg">';

$imgEnd   = '</svg>';

$flipStart = '<g transform="scale(-1, 1) translate(-#WIDTH#, 0)">';
$flipEnd   = '</g>';

$faces = [
    // Round
    '#GRADIENT# <path d="M 293 150.51 C 293 71.81 279.403 4.843 150.851 4.843 C 22.734 4.843 8 71.81 8 150.51 C 8 229.19 23.437 294.754 150.149 294.754 C 276.861 294.754 293 229.19 293 150.51 Z" #GRADSTYLE# />',

    // Square Jaw
    '#GRADIENT# <path d="M 293 150.5 C 293 71.81 277.212 5.194 150.149 5.194 C 23.086 5.194 8 71.81 8 150.5 C 8 277.113 8 295.105 150.5 295.105 C 293 295.105 293 277.121 293 150.5 Z" #GRADSTYLE# />',

    // Square Brow
    '#GRADIENT# <path d="M 293 150.5 C 293 20.693 292.79 10.526 150.29 10.526 C 7.79 10.526 8 18.538 8 150.5 C 8 229.19 25.714 295.456 150.5 295.105 C 275.286 294.754 293 229.19 293 150.5 Z" #GRADSTYLE# />',

    // Square
    '#GRADIENT# <path d="M 293 150.5 C 293 23.052 292.298 10.105 149.798 10.105 C 7.298 10.105 8 18.238 8 150.5 C 8 278.649 7.649 294.754 150.149 294.754 C 292.649 294.754 293 277.948 293 150.5 Z" #GRADSTYLE# />',

    // Pear
    '#GRADIENT# <path d="M 287.738 151.202 C 269.848 38.838 293.702 5.545 151.202 5.545 C 8.702 5.545 29.749 39.188 11.859 150.5 C -6.031 261.812 8.351 295.105 150.851 295.105 C 293.351 295.105 305.628 263.566 287.738 151.202 Z" #GRADSTYLE# />',

    // Bulb
    '#GRADIENT# <path d="M 288.316 148.605 C 270.426 260.969 294.28 294.262 151.78 294.262 C 9.28 294.262 30.327 260.619 12.437 149.307 C -5.453 37.995 7.526 9.964 150.026 9.964 C 292.526 9.964 306.206 36.241 288.316 148.605 Z" #GRADSTYLE# />'
];

$ears = [
    // Small Round
    '#GRADIENT# <path d="M 106 80 C 106 53.07 114.72 22.21 80.04 22.46 C 42.62 22.73 26 44.3 26 71.23 C 26 98.16 42.62 120 80.04 120 C 114.72 120 106 106.93 106 80 Z" #GRADSTYLE# />
     <path d="M 44 69.91 C 44 69.91 46.59 35.01 84 40.61" #LINESTYLE# />',

    // Big Round
    '#GRADIENT# <path d="M 107 79.96 C 107 48.97 120 20 74.55 13.74 C 28.21 7.36 7 38.87 7 69.87 C 7 100.86 27.77 126 74.55 126 C 107 126 107 110.96 107 79.96 Z" #GRADSTYLE# />
     <path d="M 27 68.35 C 27 68.35 30.24 28.18 77 34.63" #LINESTYLE# />',

    // Pointed
    '#GRADIENT# <path d="M 107 81.15 C 107 50.16 105.45 21.27 60 15.01 C 13.66 8.63 6.35 13.98 26 69.54 C 36.33 98.76 66.4 126 84 126 C 108.72 126 107 112.15 107 81.15 Z" #GRADSTYLE# />
     <path d="M 42 64.93 C 41.14 64.07 10.64 10.77 75 34.82" #LINESTYLE# />',

    // Trumpets
    '#GRADIENT# <path d="M 120 70 C 120 35.74 80 70 40 19.12 C 13.54 -25.47 20 35.74 20 70 C 20 104.25 13.54 154.54 40 120.88 C 80 70 120 104.25 120 70 Z" #GRADSTYLE# />
     <ellipse cx="25" cy="69" rx="14" ry="63.65" #FILLSTYLE2# />'
];

$eyes = [
    // Round
    '<circle cx="70" cy="70" r="60" #FILLSTYLE# />',

    // Evilish
    '<path d="M 130 74 C 130 106.7 110 133.99 70 133.99 C 30 133.99 10 106.7 10 74 C 10 41.3 20 1.91 70 6.91 C 120 11.91 130 41.3 130 74 Z" #FILLSTYLE# />',

    // Saddish
    '<path d="M 132.042 70.698 C 132.042 104.829 104.367 132.503 70.236 132.503 C 36.105 132.503 8.43 104.829 8.43 70.698 C 8.43 36.567 -1.88 18.758 70.236 8.891 C 142.351 -0.976 132.042 36.567 132.042 70.698 Z" #FILLSTYLE# />',

    // Oval
    '<path d="M 133.458 70.827 C 133.458 103.537 106.938 120.697 73.798 120.697 C 40.658 120.697 7.318 102.407 7.318 69.697 C 7.318 36.987 40.658 20.697 73.798 20.697 C 106.938 20.697 133.458 38.117 133.458 70.827 Z" #FILLSTYLE# />'
];

$pupil = '<circle cx="50" cy="50" r="#SIZE#" #FILLSTYLE# />';

$glint = '<circle cx="50" cy="50" r="#SIZE#" #FILLSTYLE# />';

$mouths = [
    // Cheesy grin
    ['<path d="M 229.491 42.356 C 229.491 86.846 175.181 86.846 119.491 86.846 C 63.801 86.846 9.491 90.046 9.491 43.956 C 9.491 -2.134 63.801 17.866 119.491 17.866 C 175.181 17.866 229.491 -2.134 229.491 42.356 Z" #FILLSTYLE# />
      <line x1="119.491" y1="20.596" x2="119.491" y2="86.849" #LINESTYLE# />
      <line x1="80.041" y1="17.796" x2="80.041" y2="85.426" #LINESTYLE# />
      <line x1="42.041" y1="16.166" x2="42.041" y2="82.426" #LINESTYLE# />
      <line x1="159.261" y1="17.796" x2="159.261" y2="84.056" #LINESTYLE# />
      <line x1="196.261" y1="13.796" x2="196.261" y2="80.056" #LINESTYLE# />
      <line x1="10.341" y1="50.866" x2="227.491" y2="50.866" #LINESTYLE# />', 'rgb(255, 255, 255)'],

    // Smile
    ['<path d="M 21.2 23.62 C 21.2 23.62 20 80 120.76 82.51 C 220 80 218.92 21.22 218.92 22.22" #LINESTYLE# />', ''],

    // Hmmmmm
    ['<line x1="41.292" y1="71.201" x2="201.292" y2="32.201" #LINESTYLE# />', ''],

    // Ooooh!
    ['<ellipse cx="116.778" cy="50.656" rx="39.4" ry="31.26" #FILLSTYLE# />', 'rgb(0, 0, 0)'],

    // Smirk
    ['<path d="M 28.758 36.197 C 28.758 36.197 73.248 55.813 138.733 64.966 C 213.402 75.402 223.477 63.753 223.477 63.753" #LINESTYLE# />
      <path d="M 18.234 69.626 C 18.234 69.626 18.96 56.775 25.967 40.289 C 32.213 25.594 43.667 13.935 43.667 13.935" #LINESTYLE# />
      <path d="M 164.737 84.331 C 164.737 84.331 149.639 84.756 128.053 82.37 C 112.253 80.624 95.19 76.129 95.19 76.129" #LINESTYLE# />', ''],

    // Wobbly
    ['<path d="M 19.819 35.36 C 19.819 35.36 30.099 59.198 49.536 58.417 C 71.801 57.522 64.896 44.379 84.313 45.938 C 102.066 47.363 93.196 70.648 113.805 73.036 C 129.717 74.88 123.081 51.665 145.455 51.448 C 159.841 51.308 156.295 65.864 172.809 66.208 C 184.384 66.449 191.176 50.786 201.035 48.837 C 212.451 46.58 222.918 59.563 222.918 59.563" #LINESTYLE# />', ''],

    // Arrrrrrghh!
    ['<path d="M 227.162 43.039 C 227.162 67.696 180.451 72.682 122.83 72.682 C 65.209 72.682 18.498 68.616 18.498 43.039 C 18.498 17.393 65.209 13.396 122.83 13.396 C 180.451 13.396 227.162 18.921 227.162 43.039 Z" #FILLSTYLE# />', 'rgb(0, 0, 0)'],

    // Vampire
    ['<path d="M 21.807 15.889 C 21.807 15.889 20.607 37.739 121.367 38.709 C 220.607 37.739 219.527 14.959 219.527 15.349" #LINESTYLE# />
      <path d="M 50.017 83.769 L 30.417 26.019 C 30.417 26.019 54.685 34.633 68.137 35.709 C 56.17 54.993 50.017 83.769 50.017 83.769 Z" #FILLSTYLE# />
      <path d="M 191.537 83.769 L 211.137 26.019 C 211.137 26.019 186.869 34.633 173.417 35.709 C 185.384 54.993 191.537 83.769 191.537 83.769 Z" #FILLSTYLE# />', 'rgb(255, 255, 255)'],

    // Fangs
    ['<path d="M 21.807 73.123 C 21.807 73.123 20.607 64.272 121.367 63.879 C 220.607 64.272 219.527 73.5 219.527 73.342" #LINESTYLE# />
      <path d="M 25.152 5.347 C 25.152 5.347 7.858 43.096 31.023 68.96 C 44.971 66.83 44.779 66.573 58.029 65.901 C 27.868 39.137 25.152 5.347 25.152 5.347 Z" #FILLSTYLE# />
      <path d="M 216.826 5.347 C 216.826 5.347 234.12 43.096 210.955 68.96 C 197.007 66.83 197.199 66.573 183.949 65.901 C 214.11 39.137 216.826 5.347 216.826 5.347 Z" #FILLSTYLE# />', 'rgb(255, 255, 192)'],

    // Upset
    ['<path d="M 61.383 66.517 C 61.383 66.517 60.663 38.467 120.983 37.217 C 180.393 38.467 179.743 67.707 179.743 67.207" #LINESTYLE# />', ''],

    // Tooth
    ['<path d="M 21.2 22.993 C 21.2 22.993 19.99 55.724 120.76 55.724 C 166.621 55.724 192.287 47.018 201.737 42.682" #LINESTYLE# />
      <path d="M 104.357 55.724 L 71.507 52.692 L 63.673 88.555 L 100.819 93.609 L 104.357 55.724 Z" #FILLSTYLE# />', 'rgb(255, 255, 255)'],

    // Tash
    ['<path d="M 7.697 80.829 C 14.018 29.256 43.059 4.361 121.213 12.052 C 196.81 4.959 226.536 29.635 232.501 80.829 C 189.725 60.951 156.306 59.435 121.213 59.435 C 87.208 59.435 51.05 60.263 7.697 80.829 Z" #FILLSTYLE# />
      <path d="M 77.455 77.834 C 77.455 77.834 87.671 85.829 121.001 85.829 C 154.563 85.829 163.934 77.509 163.934 77.644" #LINESTYLE# />
      <path d="M 121.213 17.463 L 121.213 56.119" #LINESTYLE# />
      <path d="M 121.213 11.982 C 104.913 17.463 100.251 38.15 100.976 56.135" #LINESTYLE# />
      <path d="M 121.213 12.052 C 86.804 10.4 80.327 38.134 81.345 56.119" #LINESTYLE# />
      <path d="M 121.213 13.183 C 68.506 1.833 57.754 37.873 59.116 59.435" #LINESTYLE# />
      <path d="M 121.213 13.183 C 50.311 -1.355 35.418 42.845 36.602 67.55" #LINESTYLE# />
      <path d="M 121.214 13.649 C 137.514 19.131 142.176 39.817 141.451 57.803" #LINESTYLE# />
      <path d="M 121.214 13.718 C 155.623 12.066 162.1 39.8 161.082 57.786" #LINESTYLE# />
      <path d="M 121.214 14.851 C 173.921 3.501 184.673 39.54 183.311 61.103" #LINESTYLE# />
      <path d="M 121.213 14.851 C 192.115 0.313 207.008 44.513 205.824 69.218" #LINESTYLE# />', 'rgb(150, 72, 0)'],

    // Curly Tash
    ['<path d="M 120.419 35.909 C 120.419 35.909 105.301 35.637 84.863 41.991 C 59.275 49.946 49.338 61.221 27.29 60.031 C -0.866 58.511 -4.494 21.434 28.339 19.205 C 45.606 18.033 49.113 30.433 45.048 36.719 C 38.756 46.446 27.432 40.466 27.432 40.466" #LINESTYLE# />
      <path d="M 120.467 35.745 C 120.467 35.745 134.682 35.247 155.12 41.601 C 180.708 49.556 190.645 60.831 212.693 59.641 C 240.849 58.121 244.477 21.044 211.644 18.815 C 194.377 17.643 190.87 30.043 194.935 36.329 C 201.227 46.056 212.551 40.076 212.551 40.076" #LINESTYLE# />
      <path d="M 140.177 64.753 C 140.177 70.564 131.574 75.275 120.961 75.275 C 110.348 75.275 101.744 70.564 101.744 64.753 C 101.744 58.942 110.348 54.231 120.961 54.231 C 131.574 54.231 140.177 58.942 140.177 64.753 Z" #FILLSTYLE# />', 'rgba(0,0,0)'],

    // Tongue
    ['<path d="M 20.742 15.212 C 20.742 15.212 19.542 37.062 120.302 38.032 C 219.542 37.062 218.462 14.282 218.462 14.672" #LINESTYLE# />
      <path d="M 174.392 67.562 C 174.632 86.882 164.142 93.932 148.042 93.932 C 131.932 93.932 118.842 83.222 116.072 67.562 C 110.852 38.032 107.472 38.032 107.472 38.032 C 120.742 38.032 168.322 36.072 166.672 35.622 C 164.122 34.932 174.152 48.022 174.392 67.562 Z" #FILLSTYLE# />
      <path d="M 149.242 70.722 C 150.272 59.032 143.742 46.172 138.862 38.012" #LINESTYLE# />', 'rgb(218, 0, 0)']
];

$tops = [
    // Spiky hair
    '<path d="M 105.134 75.858 L 40.004 17.111 L 78.944 81.067 C 78.944 81.067 27.254 64.703 27.254 63.954 C 27.254 63.205 67.534 104.114 67.534 104.114 L 8.444 101.141 L 58.134 127.161 C 58.134 127.161 10.444 149.256 11.114 149.256 C 11.784 149.256 69.164 155.293 68.494 155.293 C 68.264 155.293 52.124 173.279 52.124 173.279 L 100.134 158.958 L 120.134 174.232 L 140.134 158.958 L 163.444 170.011 L 180.134 151.763 L 233.664 146.01 C 233.664 146.01 186.214 127.956 186.884 126.469 C 187.554 124.983 233.384 104.863 232.714 104.863 C 232.044 104.863 176.984 87.013 176.984 87.013 L 210.554 50.575 C 210.554 50.575 150.794 78.82 151.464 78.082 C 152.134 77.333 164.904 46.104 165.564 46.104 C 166.224 46.104 129.314 75.109 129.314 75.109 C 129.314 75.109 115.884 30.49 115.214 30.49 L 105.134 75.858 Z" #FILLSTYLE# />',

    // Boof
    '<path d="M 227.113 66.42 C 222.245 30.202 183.483 30.994 183.483 30.994 C 183.483 30.994 175.488 0 120.507 8 C 65.509 16.002 80.177 49.823 80.177 49.823 C 80.177 49.823 26.818 16.991 8.492 78.22 C 0.492 104.949 28.238 120.594 28.238 120.594 C 28.238 120.594 1.102 145.256 33.352 162.563 C 65.844 180 83.388 163.971 83.388 163.971 C 83.388 163.971 90.777 170.855 120.507 172.043 C 160.481 173.64 163.094 164.875 163.094 164.875 C 163.094 164.875 208.744 186.301 222.703 145.384 C 230.749 121.799 210.461 104.768 210.461 104.768 C 210.461 104.768 231.89 101.964 227.113 66.42 Z" #FILLSTYLE# />
      <path d="M 59.944 111.619 C 45.222 101.218 50.194 52.895 109.944 77.899" #LINESTYLE# />
      <path d="M 121.959 48.748 C 144.114 28.513 203.663 49.027 178.842 79.932" #LINESTYLE# />
      <path d="M 93.932 126.928 C 112.084 154.774 188.128 146.618 158.192 104.517" #LINESTYLE# />',

    // Top hat
    '<path d="M 60.705 155.563 C 60.705 104.123 60.705 52.69 40.705 18.405 C 33.595 1.258 210.415 1.258 200.705 18.405 C 181.175 52.891 180.705 104.123 180.705 155.563 L 60.705 155.563 Z" #FILLSTYLE# />
      <path d="M 60.298 114.65 L 181.105 114.65 L 180.684 149.166 L 60.719 149.166 L 60.298 114.65 Z" #FILLSTYLE2# />
      <path d="M 220.705 145.453 C 220.705 154.383 175.935 159.893 120.705 159.893 C 65.475 159.893 20.705 155.623 20.705 146.693 C 20.705 137.763 65.054 141.917 120.284 141.917 C 175.514 141.917 220.705 136.523 220.705 145.453 Z" #FILLSTYLE# />',

    // Sombrero
    '<path d="M 76.278 151.563 C 76.278 100.123 83.144 27.741 120.101 27.243 C 155.67 26.763 163.025 100.123 163.025 151.563 L 76.278 151.563 Z" #FILLSTYLE# />
      <path d="M 120.379 161.564 C 66.165 161.363 12.327 163.466 8.037 143.484 C -1.854 97.415 5.998 130.835 120.257 130.835 C 233.222 130.835 243.021 100.197 232.146 143.303 C 226.877 164.188 177.215 161.774 120.379 161.564 Z" #FILLSTYLE# />
      <path d="M 19.239 154.344 L 35.702 123.681 L 47.478 159.816 L 19.239 154.344 Z" #FILLSTYLE2# />
      <path d="M 51.546 160.342 L 68.85 128.206 L 81.468 161.394 L 51.546 160.342 Z" #FILLSTYLE2# />
      <path d="M 86.482 161.394 L 102.525 130.521 L 117.037 161.605 L 86.482 161.394 Z" #FILLSTYLE2# />
      <path d="M 219.743 154.817 L 203.28 124.575 L 191.504 160.289 L 219.743 154.817 Z" #FILLSTYLE2# />
      <path d="M 187.436 160.815 L 170.132 128.679 L 157.514 161.867 L 187.436 160.815 Z" #FILLSTYLE2# />
      <path d="M 152.921 161.867 L 136.457 130.994 L 122.366 161.447 L 152.921 161.867 Z" #FILLSTYLE2# />',

    // Party hat
    '<path d="M 120.685 36.03 L 180.685 158.984 L 60.685 158.984 L 120.685 36.03 Z" #FILLSTYLE# />
      <circle cx="120" cy="26" r="20" #FILLSTYLE2# />
      <polygon points="62.565 158.818 156.745 111.124 169.105 135.236 119.665 158.818" #FILLSTYLE2# />
      <polygon points="145.555 87.525 79.635 120.357 98.465 81.896 133.785 63.437" #FILLSTYLE2# />',

    // Propeller hat
    '<path d="M 200.609 159.922 C 200.609 159.922 199.359 74.371 120.579 74.371 C 41.941 74.371 40.098 159.922 40.098 159.922 L 200.609 159.922 Z" #FILLSTYLE# />
      <path d="M 176.264 159.922 C 176.264 159.922 175.389 74.371 120.286 74.371 C 65.281 74.371 63.992 159.922 63.992 159.922 L 176.264 159.922 Z" #FILLSTYLE2# />
      <path d="M 142.484 159.922 C 142.484 159.922 142.14 74.371 120.449 74.371 C 98.795 74.371 98.288 159.922 98.288 159.922 L 142.484 159.922 Z" #FILLSTYLE# />
      <path d="M 119.935 37.272 L 119.935 73.58" #LINESTYLE# />
      <path d="M 179.002 39.536 C 178.647 11.615 118.787 35.179 120.326 35.189 C 118.787 35.179 60.869 11.221 60.869 39.287 C 60.869 65.209 120.372 40.332 120.372 40.332 C 120.372 40.332 179.342 66.311 179.002 39.536 Z" #FILLSTYLE2# />',

    // Antenna
    '<path d="M 82.15 159.927 C 80 123.911 80 48.779 40 29.996" #LINESTYLE# />
      <path d="M 162.133 159.927 C 163.12 123.911 163.904 50.99 203.124 29.996" #LINESTYLE# />
      <circle cx="25" cy="26" r="20" #FILLSTYLE# />
      <circle cx="215" cy="26" r="20" #FILLSTYLE# />',

    // Propeller hat
    '<path d="M 200.609 159.922 C 200.609 159.922 199.359 74.371 120.579 74.371 C 41.941 74.371 40.098 159.922 40.098 159.922 L 200.609 159.922 Z" #FILLSTYLE# />
      <path d="M 176.264 159.922 C 176.264 159.922 175.389 74.371 120.286 74.371 C 65.281 74.371 63.992 159.922 63.992 159.922 L 176.264 159.922 Z" #FILLSTYLE2# />
      <path d="M 142.484 159.922 C 142.484 159.922 142.14 74.371 120.449 74.371 C 98.795 74.371 98.288 159.922 98.288 159.922 L 142.484 159.922 Z" #FILLSTYLE# />
      <path d="M 119.935 37.272 L 119.935 73.58" #LINESTYLE# />
      <path d="M 179.002 39.536 C 178.647 11.615 118.787 35.179 120.326 35.189 C 118.787 35.179 60.869 11.221 60.869 39.287 C 60.869 65.209 120.372 40.332 120.372 40.332 C 120.372 40.332 179.342 66.311 179.002 39.536 Z" #FILLSTYLE2# />',

    // Deely boppers
    '<path d="M 102.15 159.927 C 100 131.936 100 73.545 60 58.947" #LINESTYLE# />
      <path d="M 138.64 159.927 C 140.79 131.936 140.79 73.545 180.79 58.947" #LINESTYLE# />
      <path d="M 64.196 93.438 L 43.006 68.167 L 11.947 79.255 L 29.433 51.293 L 9.29 25.181 L 41.287 33.17 L 59.898 5.944 L 62.186 38.843 L 93.831 48.129 L 63.249 60.473 Z" #FILLSTYLE# />
      <path d="M 176.587 93.443 L 197.776 68.172 L 228.836 79.259 L 211.35 51.298 L 231.492 25.186 L 199.496 33.174 L 180.885 5.949 L 178.596 38.847 L 146.952 48.134 L 177.534 60.477 Z" #FILLSTYLE# />',

    // Horns
    '<path d="M 35.703 169.84 C -14.507 114.12 22.083 22.09 55.023 14.12 C 35.023 34.12 27.813 124.97 74.553 154.8 C 88.113 163.25 46.103 182.42 35.703 169.84 Z" #FILLSTYLE# />
      <path d="M 25.173 154.43 C 29.792 160.64 65.149 146.48 59.416 141.27" #LINESTYLE# />
      <path d="M 15.62 134.51 C 19.432 141.077 53.999 129.888 49.054 124.225" #LINESTYLE# />
      <path d="M 12.172 112.537 C 14.756 119.366 46.318 111.075 42.639 105.052" #LINESTYLE# />
      <path d="M 12.912 89.072 C 13.534 96.021 41.397 92.007 39.695 85.7" #LINESTYLE# />
      <path d="M 16.764 65.042 C 14.592 71.382 38.425 73.338 39.481 67.353" #LINESTYLE# />
      <path d="M 25.483 45.159 C 19.686 47.751 35.644 54.726 40.398 52.029" #LINESTYLE# />
      <path d="M 35.501 30.863 C 31.709 30.398 39.473 35.311 42.693 35.541" #LINESTYLE# />

      <path d="M 204.85 169.84 C 255.06 114.12 218.47 22.09 185.53 14.12 C 205.53 34.12 212.74 124.97 166 154.8 C 152.44 163.25 194.45 182.42 204.85 169.84 Z" #FILLSTYLE# />
      <path d="M 215.717 154.403 C 211.07 160.613 175.499 146.453 181.267 141.243" #LINESTYLE# />
      <path d="M 224.27 134.483 C 220.529 141.05 186.606 129.861 191.459 124.198" #LINESTYLE# />
      <path d="M 228.718 112.51 C 226.099 119.339 194.105 111.048 197.834 105.025" #LINESTYLE# />
      <path d="M 227.978 89.045 C 227.356 95.994 199.493 91.98 201.195 85.673" #LINESTYLE# />
      <path d="M 224.126 65.015 C 226.298 71.355 202.465 73.311 201.409 67.326" #LINESTYLE# />
      <path d="M 215.407 45.132 C 221.204 47.724 205.246 54.699 200.492 52.002" #LINESTYLE# />
      <path d="M 205.389 30.836 C 209.181 30.371 201.417 35.284 198.197 35.514" #LINESTYLE# />',

    // Cap
    '<path d="M 211.147 164.058 C 210.601 86.387 230.003 52.551 120.884 52.551 C 17.403 52.551 30.113 92.716 30.113 164.058 C 73.225 164.058 172.887 164.058 211.147 164.058 Z" #FILLSTYLE# />
      <path d="M 212.159 164.058 C 212.159 164.058 282.271 99.722 161.658 104.245 C 43.997 108.657 30.106 164.058 30.106 164.058 L 212.159 164.058 Z" #FILLSTYLE2# />
      <path d="M 133.596 52.551 C 135.719 47.321 135.55 40.771 121.431 40.771 C 108.042 40.771 109.979 47.633 109.686 52.507 C 123.405 52.551 123.405 52.551 133.596 52.551 Z" #FILLSTYLE2# />',

    // Crown
    '<path d="M 21.994 35.845 L 60.571 90.987 L 67.075 29.61 L 98.151 88.196 L 119.943 26.385 L 142.428 88.063 L 171.243 28.571 L 180.91 89.033 L 217.095 33.108 L 196 162 L 45.777 162.123 L 21.994 35.845 Z" #FILLSTYLE2# />
      <ellipse cx="120" cy="125" rx="15" ry="21" #FILLSTYLE# />
      <ellipse cx="70" cy="125" rx="15" ry="21" #FILLSTYLE# />
      <ellipse cx="170" cy="125" rx="15" ry="21" #FILLSTYLE# />'
];


$fillStyle = 'style="stroke: #LINECOL#;
                     fill: #FILLCOL#;
                     stroke-width: #STROKE#px;
                     stroke-linecap: round;
                     stroke-linejoin: round;
                     paint-order: fill;"';

$fillStyle2 = str_replace( '#FILLCOL#', '#FILLCOL2#', $fillStyle );

$lineStyle = 'style="stroke: #LINECOL#;
                     fill: none;
                     stroke-width: #STROKE#px;
                     stroke-linecap: round;
                     stroke-linejoin: round;"';

$gradDef = '<defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#FILLCOL#;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#FILLCOL2#;stop-opacity:1" />
                </linearGradient>
            </defs>';

$gradStyle = 'style="stroke: #LINECOL#;
                     fill: url(#gradient);
                     stroke-width: #STROKE#px;
                     stroke-linecap: round;
                     stroke-linejoin: round;
                     paint-order: fill;"';



function styled( $svg, $stroke, $fillCol, $lineCol='rgb(0, 0, 0)', $fillCol2='' ) {
    global $fillStyle;
    global $fillStyle2;
    global $lineStyle;
    global $gradDef;
    global $gradStyle;

    $styledSVG = $svg;
    $styledSVG = str_replace( '#GRADIENT#',   $gradDef,    $styledSVG );
    $styledSVG = str_replace( '#GRADSTYLE#',  $gradStyle,  $styledSVG );
    $styledSVG = str_replace( '#FILLSTYLE#',  $fillStyle,  $styledSVG );
    $styledSVG = str_replace( '#FILLSTYLE2#', $fillStyle2, $styledSVG );
    $styledSVG = str_replace( '#LINESTYLE#',  $lineStyle,  $styledSVG );
    $styledSVG = str_replace( '#STROKE#',     $stroke,     $styledSVG );
    $styledSVG = str_replace( '#FILLCOL#',    $fillCol,    $styledSVG );
    $styledSVG = str_replace( '#FILLCOL2#',   $fillCol2,   $styledSVG );
    $styledSVG = str_replace( '#LINECOL#',    $lineCol,    $styledSVG );

    return $styledSVG;
}


$size     = 480;
$faceW    = 300;
$faceH    = 300;
$earW     = 120;
$earH     = 140;
$eyeW     = 140;
$eyeH     = 140;
$pupilW   = 100;
$pupilH   = 100;
$mouthW   = 240;
$mouthH   = 100;
$topW     = 240;
$topH     = 180;


$faceID    = $id == 'NOID' ? array_rand( $faces )  :        hexdec( substr( $hash,  0, 1 ) ) % count( $faces );
$earID     = $id == 'NOID' ? array_rand( $ears )   :        hexdec( substr( $hash,  1, 1 ) ) % count( $ears );
$eyeID     = $id == 'NOID' ? array_rand( $eyes )   :        hexdec( substr( $hash,  2, 1 ) ) % count( $eyes );
$mouthID   = $id == 'NOID' ? array_rand( $mouths ) :        hexdec( substr( $hash,  3, 1 ) ) % count( $mouths );
$topID     = $id == 'NOID' ? array_rand( $tops )   :        hexdec( substr( $hash,  4, 1 ) ) % count( $tops );

$faceHue   = $id == 'NOID' ? rand( 0, 359 )        :        hexdec( substr( $hash,  5, 3 ) ) % 360;
$faceDark  = $id == 'NOID' ? rand( 40, 90 )        :  40 + (hexdec( substr( $hash,  8, 2 ) ) % 50);
$pupilSize = $id == 'NOID' ? rand( 20, 30 )        :  20 + (hexdec( substr( $hash, 10, 1 ) ) % 10);
$irisSize  = $id == 'NOID' ? rand( 10, 20)         :  10 + (hexdec( substr( $hash, 11, 1 ) ) % 10);
$irisHue   = $id == 'NOID' ? rand( 0, 359 )        :        hexdec( substr( $hash, 12, 3 ) ) % 360;
$topHue1   = $id == 'NOID' ? rand( 0, 359 )        :        hexdec( substr( $hash, 15, 3 ) ) % 360;
$topHue2   = $topHue1;
$topHue2  += $id == 'NOID' ? rand( 135, 215 )      : 135 + (hexdec( substr( $hash, 18, 2 ) ) % 90);

$earInX    = $id == 'NOID' ? rand( 30, 40 )        :  30 + (hexdec( substr( $hash, 20, 1 ) ) % 10);
$earInY    = $id == 'NOID' ? rand( 40, 80 )        :  40 + (hexdec( substr( $hash, 21, 2 ) ) % 40);
$eyeInX    = $id == 'NOID' ? rand( 5, 15 )         :   5 + (hexdec( substr( $hash, 23, 1 ) ) % 10);
$eyeInY    = $id == 'NOID' ? rand( 20, 40 )        :  20 + (hexdec( substr( $hash, 24, 2 ) ) % 20);
$pupilInX  = $id == 'NOID' ? rand( 5, 35 )         :   5 + (hexdec( substr( $hash, 26, 2 ) ) % 30);
$pupilInY  = $id == 'NOID' ? rand( 10, 30 )        :  10 + (hexdec( substr( $hash, 28, 2 ) ) % 20);
$mouthInY  = $id == 'NOID' ? rand( -5, 0 )         :  -5 + (hexdec( substr( $hash, 30, 1 ) ) % 5);

$face   = styled( $faces[$faceID], 8,
                  'hsl('.$faceHue.', 50%, '.$faceDark.'%)',
                  'rgb(0, 0, 0)',
                  //'hsl('.$faceHue.', 50%, '.($faceDark/1.5).'%)' );
                  'hsl('.$faceHue.', 50%, '.$faceDark.'%)' );

$earL   = styled( $ears[$earID], 8,
                  'hsl('.$faceHue.', 50%, '.$faceDark.'%)',
                  'rgb(0, 0, 0)',
                  //'hsl('.$faceHue.', 50%, '.($faceDark/1.5).'%)' );
                  'hsl('.$faceHue.', 50%, '.$faceDark.'%)' );

$earR   = str_replace( '#WIDTH#', $earW, $flipStart ).$earL.$flipEnd;

//$eyeCol = $eyeTinted == 0 ? 'rgb(255, 255, 128)' : 'rgb(255, 255, 255)';
$eyeCol = 'rgb(255, 255, 240)';
$eyeL   = styled( $eyes[$eyeID], 8, $eyeCol );
$eyeR   = str_replace( '#WIDTH#', $eyeW, $flipStart ).$eyeL.$flipEnd;

$pupil  = styled( $pupil, $irisSize, 'rgb(0, 0, 0)', 'hsl('.$irisHue.', 100%, 40%)' );
$pupil  = str_replace( '#SIZE#', $pupilSize, $pupil );

$glintSize = ($pupilSize + $irisSize) / 3;
$glint  = styled( $glint, 0, 'rgb(255, 255, 255)', 'rgb(255, 255, 255)' );
$glint  = str_replace( '#SIZE#', $glintSize, $glint );

$mouth  = $mouths[$mouthID];
$mouth  = styled( $mouth[0], 8, $mouth[1] );

$top    = styled( $tops[$topID], 8,
                  'hsl('.$topHue1.', 100%, 40%)',
                  'rgb(0, 0, 0)',
                  'hsl('.$topHue2.', 100%, 50%)' );


$faceX = ($size - $faceW) / 2;
$faceY = $size - $faceH - 30;

$earLX = $faceX - $earW + $earInX;
$earRX = $faceX + $faceW - $earInX;
$earY  = $faceY + $earInY;

$eyeLX = $faceX + $eyeInX;
$eyeRX = $faceX + $faceW - $eyeW - $eyeInX;
$eyeY  = $faceY + $eyeInY;

$pupilLX = $eyeLX + $pupilInX;
$pupilRX = $eyeRX + $pupilInX;
$pupilY  = $eyeY  + $pupilInY;

$glintLX = $pupilLX - ($glintSize * 1.2);
$glintRX = $pupilRX - ($glintSize * 1.2);
$glintY  = $pupilY  - ($glintSize * 1.2);

$mouthX = ($size - $mouthW) / 2;
$mouthY = $eyeY + $eyeH + $mouthInY;

$topX = ($size - $topW) / 2;
$topY = 7;


header("Content-type: image/svg+xml");

echo $imgStart;
echo   '<svg x="'.$earLX  .'" y="'.$earY  .'">'.$earL .'</svg>';
echo   '<svg x="'.$earRX  .'" y="'.$earY  .'">'.$earR .'</svg>';
echo   '<svg x="'.$faceX  .'" y="'.$faceY .'">'.$face .'</svg>';
echo   '<svg x="'.$topX   .'" y="'.$topY  .'">'.$top  .'</svg>';
echo   '<svg x="'.$eyeLX  .'" y="'.$eyeY  .'">'.$eyeL .'</svg>';
echo   '<svg x="'.$eyeRX  .'" y="'.$eyeY  .'">'.$eyeR .'</svg>';
echo   '<svg x="'.$pupilLX.'" y="'.$pupilY.'">'.$pupil.'</svg>';
echo   '<svg x="'.$pupilRX.'" y="'.$pupilY.'">'.$pupil.'</svg>';
echo   '<svg x="'.$glintLX.'" y="'.$glintY.'">'.$glint.'</svg>';
echo   '<svg x="'.$glintRX.'" y="'.$glintY.'">'.$glint.'</svg>';
echo   '<svg x="'.$mouthX.'"  y="'.$mouthY.'">'.$mouth.'</svg>';
echo $imgEnd;

?>
