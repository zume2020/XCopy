<html>
    <head>
        <title>PHP ajax form Submission without refreshing the Page</title>
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- CSS Style -->
        <link rel="stylesheet" href="css/style.css" />

    </head>
    <body> 
        <div id="container">
        
            <h2>PHP Ajax form Submission</h2>
            <p>Here we demonstrate how to post froms using PHP , Ajax, MySQL and jQuery without refreshing the page.</p>
            <div id="alert" class="hiden">Data added</div>    
            
            <form id="form">
                <input type="text" id="name" placeholder="Your Name"/><br/>
                <textarea placeholder="Your message.." id="msg"></textarea>
                <input type="button" id="submit" value="Submit"/>
            
            </form>
        </div>
        <div id="foot">made with love <a href="https://github.com/zume2020">zume</a></div>

        </body>
<script type="text/javascript">
$(document).ready(function(){  
$("#submit").click(function(){
var name = $("#name").val();
var msg = $("#msg").val();

if(name ==''|| msg==''){
alert("Some fields are blank");     
}
else{
// Returns successful data submission message when the entered information is stored in database.
$.post("process.php",{
 Name: name,
 Message: msg
},
            function(data) {
            //alert(data);
            $('#form')[0].reset(); //To reset form fields after submission

            $('#alert').animate({ //for fade in animation
                opacity:'show',
                height:'show',
                marginTop:'show',
                marginBottom:'show',
                paddingTop:'show',
                paddingBottom:'show'
            });
            
                $('#alert').fadeTo(2000,500).slideUp(500,function(){ //fade out
                    $('#alert').addClass('hiden'); //adds a class .hidden
                });
        
            });
    
    }
});
});
</script>
</html>
 