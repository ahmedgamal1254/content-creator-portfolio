<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fill Your Report</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- style links --}}
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
</head>
<body>
    <div class="above" style="margin: 100px 0px;">
        <div class="heading" style="text-align: center">
            Welcome Content Creator {{ Auth::user()->name }}
            <span style="display: block;">please fill your report for this day {{ date('d/m/Y') }}</span>
        </div>
    </div>
    <div class="container">
        <form action="{{ route("store") }}" method="post" id="form_content">
            @csrf
            <div class="step step1">
                <label for="country">Publish Day</label>
                <select id="country" name="days_of_week" class="form-control" name="days_of_week">
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="trusday">Trusday</option>
                    <option value="friday">friday</option>
                </select>

                <label for="history">Publish Date</label>
                <span style="font-size: 12px;">التاريخ</span>
                <input type="date" name="history" id="history" class="form-control">

                <label for="number_of_posts_per_week">Total no. of Published Content / Day</label>
                <select id="number_of_posts_per_week" class="form-control" name="number_of_posts_per_week">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                </select>

                <input type="button" value="back" id="back" class="btn btn-outline-primary" />
                <input type="button" value="next" id="next" class="btn btn-primary" />
            </div>
        </form>
    </div>
    <script>
        document.getElementById("next").addEventListener("click",function (e){
            // e.preventDefault();

            for(let i=1;i<parseInt(document.getElementById("number_of_posts_per_week").value)+1;i++){
                var z = document.createElement('div'); // is a node
                z.classList.add(`content`);
                z.setAttribute("id", `content_${i}`);
                z.innerHTML = `
                    <h2>Content ${i}</h2>
                    <input type="hidden" name="content_${i}_name" value=content${i} />
                    <label for="history">Creation Date</label>
                    <input type="date" name="content_${i}_date" id="history" class="form-control">

                    <label for="number_of_posts_per_week">Platform</label>
                    <select id="number_of_posts_per_week" multiple class="form-control" name="content_${i}_platform[]">
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="twitter">Twitter</option>
                        <option value="linkedin">Linked In</option>
                        <option value="tiktok">Tik Tok</option>
                        <option value="youtube">You Tube</option>
                        <option value="snapchat">Snap Chat</option>
                        <option value="telegram">Telegram</option>
                        <option value="threads">Threads</option>
                        <option value="google Maps">Google Maps</option>
                        <option value="website">Website</option>
                    </select>

                    <label for="number_of_posts_per_week">Task</label>
                    <select id="number_of_posts_per_week" multiple class="form-control" name="content_${i}_task[]">
                        <option value="post">Post</option>
                        <option value="story">Story</option>
                        <option value="survey">Survey</option>
                        <option value="carousel">Carousel</option>
                        <option value="copywrite">Copy write</option>
                        <option value="book">Book</option>
                    </select>

                    <label for="number_of_posts_per_week">Company Project</label>
                    <select id="number_of_posts_per_week" multiple class="form-control" name="content_${i}_company">
                        <option value="advertizer">Advertizer</option>
                        <option value="afzaz">Afzaz</option>
                        <option value="alkeram">Al-Keram</option>
                        <option value="mahmoudsaeed">Mahmoud Saeed</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="client">If Client Project, Please draft Client name</label>
                    <input type="text" name="content_${i}_client_name" id="client" class="form-control">

                    <label for="url">Url</label>
                    <input type="text" name="content_${i}_url" id="url" class="form-control">
                `;

                if(i==parseInt(document.getElementById("number_of_posts_per_week").value)){
                    z.innerHTML+=`
                    <input type="button" value="back" id="back_content" class="btn btn-outline-primary" />
                    <button type="submit" class="btn btn-success">أرسال</button>
                    `
                }else{
                    z.innerHTML+=`
                    <input type="button" value="back" id="back_content" class="btn btn-outline-primary" />
                    <input type="button" value="next" class="content_btn" id="content_btn_${i}" class="btn btn-primary" />
                    `
                }

                document.getElementById("form_content").appendChild(z)

                document.getElementsByClassName("step")[0].style.display="none"

                if(i==parseInt(document.getElementById("number_of_posts_per_week").value)){
                    btns=document.getElementsByClassName("content_btn")
                    Array.from(btns).forEach((element) => {
                        element.addEventListener("click",function (){
                            index=this.attributes["id"].value.split("_")[2]
                            next_element=parseInt(index)+parseInt(1)
                            document.getElementById(`content_${index}`).style.display="none"
                            document.getElementById(`content_${next_element}`).style.display="block"
                        })
                    });
                }
            }
        })
    </script>
</body>
</html>
