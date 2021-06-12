(function() 
 {
  var allQuestions = [{
    question: "Have you ever plant tree in you life?",
    options: ["no", "yes", "i am table", "weed"],
    answer: 1
  }, {
    question: "have you ever helped someone?",
    options: ["yes", "yes myself", "the person in mirror", "help me"],
    answer: 0
  }, {
    question: "Have you ever built a house ?",
    options: ["nope", "in minecraft", "yes","i am homeless"],
    answer: 2
  },{
    question: "Which of the following is used in Pencils ?",
    options: ["Graphite", "Silicon", "Charcoal", "Phosphorous"],
    answer: 0
  }, {
    question: "Chemical formula of water ?",
    options: ["NaA1O2", "H2O", "Al2O3", "CaSiO3"],
    answer: 1
  },{
    question: "Sophia has 3 brothers and 2 sisters.How many brothers and sisters does his brother George have?",
    options: ["2 brothers and 3 sisters", "3 brothers and 2 sisters", "who is giorgi", "ask mother"],
    answer: 0
  },{
    question: "have you ever solved michael programming problem",
    options: ["who is michael", "what is michael", "no", "yes bro i know that pain"],
    answer: 3
  },{
    question: "are you enjoying quiz?",
    options: [".!.", "hell no", "->", "click here"],
    answer: 3
  },{
    question: "1=5, 2=10,3=15, 5=?",
    options: ["25", "chocolate", "1", "20"],
    answer: 2
  }];
  
  var quesCounter = 0;
  var selectOptions = [];
  var quizSpace = $('#quiz');
    
  nextQuestion();
    
  $('#next').click(function () 
    {
        chooseOption();
        if (isNaN(selectOptions[quesCounter])) 
        {
            alert('Please select an option !');
        } 
        else 
        {
          quesCounter++;
          nextQuestion();
        }
    });
  
  $('#prev').click(function () 
    {
        chooseOption();
        quesCounter--;
        nextQuestion();
    });
  
  function createElement(index) 
    {
        var element = $('<div>',{id: 'question'});
        var header = $('<h2>Question No. ' + (index + 1) + ' :</h2>');
        element.append(header);

        var question = $('<p>').append(allQuestions[index].question);
        element.append(question);

        var radio = radioButtons(index);
        element.append(radio);

        return element;
    }
  
  function radioButtons(index) 
    {
        var radioItems = $('<ul>');
        var item;
        var input = '';
        for (var i = 0; i < allQuestions[index].options.length; i++) {
          item = $('<li>');
          input = '<input type="radio" name="answer" value=' + i + ' />';
          input += allQuestions[index].options[i];
          item.append(input);
          radioItems.append(item);
        }
        return radioItems;
  }
  
  function chooseOption() 
    {
        selectOptions[quesCounter] = +$('input[name="answer"]:checked').val();
    }
   
  function nextQuestion() 
    {
        quizSpace.fadeOut(function() 
            {
              $('#question').remove();
              if(quesCounter < allQuestions.length)
                {
                    var nextQuestion = createElement(quesCounter);
                    quizSpace.append(nextQuestion).fadeIn();
                    if (!(isNaN(selectOptions[quesCounter]))) 
                    {
                      $('input[value='+selectOptions[quesCounter]+']').prop('checked', true);
                    }
                    if(quesCounter === 1)
                    {
                      $('#prev').show();
                    } 
                    else if(quesCounter === 0)
                    {
                      $('#prev').hide();
                      $('#next').show();
                    }
                }
              else 
                {
                    var scoreRslt = displayResult();
					if(scoreRslt>5)
					{
						quizSpace.append("good human being").fadeIn();
					}
					else
					{
						quizSpace.append("you will burn in hell").fadeIn();
					}
                    $('#next').hide();
                    $('#prev').hide();
                }
        });
    }
  
  function displayResult() 
    {
        var score = $('<p>',{id: 'question'});
        var correct = 0;
        for (var i = 0; i < selectOptions.length; i++) 
        {
          if (selectOptions[i] === allQuestions[i].answer) 
          {
            correct++;
          }
        }
        score.append('You scored ' + correct + ' out of ' +allQuestions.length);
        return score;
  }
})();