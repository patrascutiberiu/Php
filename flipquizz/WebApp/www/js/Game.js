class Game
{
    constructor() {
        this.teams =[];
        this.quiz = new Quiz();
        this.started = false;
    }

    addTeam() {
        let _id = this.teams.length + 1;
        this.teams.push(new Team(_id));
    }

    deleteTeam() {
        //pop() cherche et supprimer le dernier element 
        this.teams.pop();
    }
    
}

// Game = function() {
//     this.teams = [];
//     this.quiz = new Quiz();

//     this.addTeam = function() {
//         let _id = this.teams.length + 1;
//         this.teams.push(new Team(_id));
//     }
        //this.deleteTeam() {
            //pop() cherche et supprimer le dernier element 
        //this.teams.pop();
//      }
// }