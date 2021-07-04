@extends('welcome')
@section('content')
    <div class="faqs-box">
        <h1>Frequently Asked Questions (FAQ)</h1>
        <div class="question-box">
            @for ($i = 0; $i < 5; $i++)
                <div class="main-box">
                    <div class="questions">
                        <div class="line">
                        </div>
                        <h5>
                            Q. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum nesciunt dolor deleniti eius esse, vero laudantium? Nam at similique, hic atque minus modi delectus? Distinctio neque ipsam incidunt doloribus?
                        </h5>
                        
                    </div> 
                    <div class="answers">
                        <div class="line">
                        </div>
                        <h5>
                            A. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum nesciunt dolor deleniti eius esse, vero laudantium? Nam at similique, hic atque minus modi delectus? Distinctio neque ipsam incidunt doloribus?
                        </h5>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
<link rel="stylesheet" href="css/faq.css">