<template>
  <!-- To add Score for users -->
  <div class="container">
    <div class="col-md-6 col-md-offset-2">
      <!-- ALERTS IF DATA CHANGE -->
      <div
        id="success_message"
        class="alert alert-success"
        v-if="scoreChangeAlert == 1"
      >Score Changed</div>
      <form name="myform">
        <label for="empl">Employee:</label>
        <select
          v-model="selectedClient"
          class="form-control sell"
          @blur="$v.selectedClient.$touch()"
          id="empl"
        >
          <option v-for="option in usersList" :value="option.id">{{ option.user_name }}</option>
        </select>
        <p
          v-if="$v.selectedClient.$dirty &&  !$v.selectedClient.required"
          class="error-message"
        >Select a user</p>
        <label for="typ">Type:</label>
        <select v-model="Type" @blur="$v.Type.$touch()" class="form-control sell" id="typ">
          <option v-for="option in types" :value="option">{{ option }}</option>
        </select>
        <p v-if="$v.Type.$dirty &&  !$v.Type.required" class="error-message">Select a Type</p>
        <label for="typ">Score:</label>
        <input
          type="number"
          class="form-control"
          @blur="$v.score.$touch()"
          v-model="score"
          id="scr"
        >
        <p v-if="$v.score.$dirty &&  !$v.score.required" class="error-message">Enter a score</p>
        <label for="typ">Comments:</label>
        <input type="text" class="form-control" v-model="comments" id="cmnt">
      </form>
      <br>
      <br>
      <button @click="scoreUpdate()" :disabled="$v.$invalid" class="btn btn-primary fr">Update Score</button>
    </div>
  </div>
</template>

<script>
import {
  required,
  minLength,
  between,
  integer,
  email
} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      usersList: [],
      types: ["Credit", "Debit"],
      Type: null,
      selectedClient: null,
      score: null,
      scoreChangeAlert: 0,
      comments: null
    };
  },
  //   Gets the users list from database
  created: function() {
    var x = this;
    // `this` points to the vm instance
    axios
      .get(`${x.$Url}projectuser`, {})
      .then(function(response) {
        if (response.status == 200) {
          //console.log(response.data);
          x.usersList = response.data;
        } else {
          alert("Error");
        }
        //console.log(response);
      })
      .catch(function(error) {
        //console.log(error);
      });
  },
  validations: {
    selectedClient: {
      required
    },
    Type: {
      required
    },
    score: {
      required
    }
  },
  //   Changes the score
  methods: {
    scoreUpdate() {
      var x = this;
      axios
        .put(`${x.$Url}projectuser/${x.selectedClient}`, {
          score: this.score,
          type: this.Type,
          id: this.selectedClient,
          comments: this.comments
        })
        .then(function(response) {
          if (response.status == 200) {
            //console.log(response);
            x.scoreChangeAlert = 1;
            x.selectedClient = null;
            x.Type = null;
            x.score = null;
            x.comments = null;
            setTimeout(function() {
              x.scoreChangeAlert = 0;
            }, 3000);
          } else {
            alert("Error");
          }
          //console.log(response);
        })
        .catch(function(error) {
          //console.log(error);
        });
    }
  }
};
</script>

<style>
.fr {
  float: right;
}
</style>
