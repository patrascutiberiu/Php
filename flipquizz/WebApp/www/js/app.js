//le code s'executera quand la page est entierement charger
window.addEventListener('DOMContentLoaded', function () {

    app = new Vue({
        //element lie au id vue
        el: '#vue',
        data: {
            quizzes: [],
            //categories: [],
            questions: [],
            game: new Game(),
            // pageTitle: 'Salutée',
            // renderBody: 'Contenu de la page',
            // year: 2020,
            // authors: ['Julien', 'Adrien', 'Tib', 'François', 'Balkany', 'Mickaël'],
            // isActive: false
            disabled:false,
            disabled_conf: false,
            disabled_btn:false,
        },
        mounted: function () {
            //function de reapel
            //new db
            //select quiz

        },
        methods: {
            getQuizzes: function (_db) {
                this.quizzes = _db.quizzes;
                console.log('App loading Quizzes');
            },
            clickConf: function () {
                var db = new Db();
                db.loadQuizzes(this.getQuizzes);
                this.disabled_conf=true;
                this.disabled_btn=false;
            },
            clickAddTeams: function (){
                this.disabled= true;
                this.disabled_conf=false;
                this.disabled_btn=true;
            },
            gameStarted: function () {
                this.game.started = true;
                this.disabled= false;
            },
            addTeam: function () {
                if (this.game.teams.length < 4) {
                    this.game.addTeam();
                    if (this.quizzes.length < 1) {
                        var db = new Db();
                        db.loadQuizzes(this.getQuizzes);
                    }
                }
            },
            deleteTeam: function () {
                this.game.deleteTeam();
            },
            loadCategories: function (_event) {
                // for(var myQuiz of this.quizzes){
                //     if (myQuiz.quiz_id == event.target.dataset.id) {
                //         //aliment le quiz 
                //         this.game.quiz.hydrate(myQuiz);

                //         break;
                //     }
                // }

                //first or default c#
                //la meme chose que avant avec les predicats
                var quiz = this.quizzes.find(item => item.quiz_id == event.target.dataset.id);
                //
                this.game.quiz.hydrate(quiz);

                var db = new Db();
                db.loadCategories(_event.target.dataset.id, this.getCategories);

                //target obj qui a declancher levent
                console.log(_event.target.dataset.id);
            },
            getCategories: function (_db) {
                //this.categories = _db.categories;
                //
                //this.game.quiz.categories =_db.categories;
                /* for (var cat of _db.categories) {
                     var newCategories = new Category();

                     newCategories.hydrate(cat);

                     this.game.quiz.categories.push(newCategories);
                 }*/

                this.game.quiz.categories = _db.categories.map(item => new Category().hydrate(item));

                console.log("App Categories loaded");
            },
            loadQuestions: function (_event) {
                var db = new Db();
                db.loadQuestions(_event.target.dataset.id, this.getQuestions);
                console.log(_event.target.dataset.id);
            },
            getQuestions: function (_db) {
                this.questions = _db.questions;
                console.log("App Questions loaded");
            },

        },
    });

    // document.querySelector("#btn").addEventListener("click", function(){
    //     app.year = parseInt(app.year);
    //     app.year += 1;
    //     //app.authors.push('The boss');
    //     app.isActive= !app.isActive;
    // });



    /**center */

    var btnScore = document.querySelector(".score");
    var btnReponse = document.querySelector(".btnReponse");
    var btnClose = document.querySelector(".close");
    var btnCloseTotal = document.querySelector(".closeTotal");
    var modalPrincipal = document.querySelector("#modalPrincipal");
    var modalSecondary = document.querySelector("#modalSecondary");


    btnScore.addEventListener("click", function () {
        modalPrincipal.style = 'display:block;';
    });

    btnClose.addEventListener("click", function () {
        modalPrincipal.style = 'display:none;';
    });

    btnReponse.addEventListener("click", function () {
        modalSecondary.style = 'display:block;';
    });

    btnCloseTotal.addEventListener("click", function () {
        modalSecondary.style = 'display:none;';
        modalPrincipal.style = 'display:none;';
    });


    // var mainContent = document.querySelector(".main");
    // var centerQuiz = document.querySelector(".right");
    // var titre = document.querySelector('.titre');

    // var btnStart = document.querySelector("#btnStart");
    // btnStart.addEventListener("click", function () {
    //     mainContent.style = 'display:none;';
    //     centerQuiz.style = 'display:flex';
    //     btnStart.style = 'display:none';
    // });

    // btnBack = document.querySelector(".back");

    // btnBack.addEventListener("click", function () {
    //     document.querySelector("#modalSecondary").style = "display:none;";
    // });

});