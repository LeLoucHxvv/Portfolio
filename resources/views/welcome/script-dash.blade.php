<script>
    var sentences = ["Please Click The link below :< "];
    var index = 0;
    var textIndex = 0;
    var sentence = "";

    function typeWriter() {
        sentence = sentences[index];
        document.getElementById("typing-animation").innerHTML = "";
        typeSentence();
    }

    function typeSentence() {
        if (textIndex < sentence.length) {
            document.getElementById("typing-animation").innerHTML += sentence.charAt(textIndex);
            textIndex++;
            setTimeout(typeSentence, 150); // Adjust typing speed here (milliseconds)
        } else {
            textIndex = 0;
            index = (index + 1) % sentences.length;
            setTimeout(typeWriter, 1500); // Adjust delay before starting next sentence
        }
    }

    // Start the typing animation
    typeWriter();

    
</script>
