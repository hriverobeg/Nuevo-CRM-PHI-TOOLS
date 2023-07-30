@props(['mb' => '16px'])
<p style="
    margin: 0px 100px;
    font-weight: 500;
    font-size: 18px;
    line-height: 23px;
    margin-bottom: {{ $mb }};
    font-family: Arial, Helvetica, sans-serif;
">{{ $slot }}</p>
