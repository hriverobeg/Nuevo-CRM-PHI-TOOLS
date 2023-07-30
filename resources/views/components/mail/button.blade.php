@props(['href'])
<a
{{ $attributes }}
style="
margin: 0px 100px;
background: #5F8BFA;
border-radius: 4px 0px;
width: 239px;
height: 56px;
display: block;
color: white;
text-align: center;
line-height: 56px;
text-decoration: none;
letter-spacing: 2px;
text-transform: uppercase;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;" href="{{ $href }}">{{ $slot }}</a>
