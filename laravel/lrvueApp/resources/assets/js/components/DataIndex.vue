<template>
  <div class="container">
    <div class="form-group">
      <router-link :to="{name: 'dataCreate'}" class="btn btn-success">Data</router-link>
    </div>
    <!-- <div>Hey There</div> -->
    <!-- <h1>{{ email }}</h1> -->
    <form>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="form-group">
            <label for="name">FirstName</label>
            <input
              type="text"
              v-model="form.name"
              @blur="$v.form.name.$touch()"
              id="name"
              name="name"
              class="form-control"
            >
            <p
              v-if="$v.form.name.$dirty &&  !$v.form.name.required"
              class="error-message"
            >The name field is required</p>
            <!-- <p>Invalid: {{$v.form.$invalid }} | Dirty: {{  }}$v.form.name.$dirty}}</p> -->
          </div>
          <div class="form-group">
            <label for="lastname">LastName</label>
            <input
              type="lastname"
              v-model="form.lastname"
              id="lastname"
              name="lastname"
              @blur="$v.form.lastname.$touch()"
              class="form-control"
            >
            <p
              v-if="$v.form.lastname.$dirty &&  !$v.form.lastname.required"
              class="error-message"
            >The last name field is required</p>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="text"
              v-model="form.email"
              id="email"
              name="email"
              @blur="$v.form.email.$touch()"
              class="form-control"
            >
            <p
              v-if="!$v.form.email.email &&  $v.form.email.$error"
              class="error-message"
            >Invalid Email ID</p>
            <p
              v-if="!$v.form.email.required && $v.form.email.$error"
              class="error-message"
            >Email is required</p>
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input
              type="number"
              v-model="form.age"
              id="age"
              name="age"
              @blur="$v.form.age.$touch()"
              class="form-control"
            >
            <div v-if="$v.form.age.$error">
              <p v-if="$v.form.age.$required" class="error-message">The age field is required</p>
              <p v-else-if="!$v.form.age.integer" class="error-message">The age field is invalid</p>
              <p
                v-else-if="!$v.form.age.between"
                class="error-message"
              >The age Should be between 12 and 120</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
          <label for="message">Address</label>
          <br>
          <textarea
            id="message"
            v-model="form.address"
            @blur="$v.form.address.$touch()"
            name="message"
            rows="5"
            class="form-control"
          ></textarea>
          <p
            v-if="$v.form.address.$dirty &&  !$v.form.address.required"
            class="error-message"
          >The address field is required</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
          <label for="male">
            <input type="radio" v-model="form.gender" name="gender" id="male" value="Male"> Male
          </label>
          <label for="female">
            <input type="radio" v-model="form.gender" id="female" name="gender" value="Female"> Female
          </label>
          <p
            v-if="$v.form.name.$dirty &&  !$v.form.name.required"
            class="error-message"
          >The gender field is required</p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="form-group">
            <label for="no">Phone Number</label>
            <input
              type="text"
              v-model="form.number"
              @blur="$v.form.number.$touch()"
              id="no"
              name="no"
              class="form-control"
            >
            <!-- <input type="text" v-model="form.testVal" id="no" name="no" class="form-control"> -->
            <p
              v-if="$v.form.number.$dirty &&  !$v.form.number.required"
              class="error-message"
            >The Number field is required</p>
            <p
              v-if="$v.form.number.$dirty &&  !$v.form.number.integer"
              class="error-message"
            >The Number field must be a number</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <button
            class="btn btn-primary"
            @click="axiis"
            @click.prevent="submitted"
            :disabled="$v.form.$invalid"
          >Submit!</button>
        </div>
      </div>
    </form>
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
// import { EventBus } from "../main";
export default {
  data() {
    return {
      form: {
        name: null,
        lastname: null,
        email: null,
        age: null,
        address: null,
        gender: null,
        number: null,
        testVal: null
      },
      // form: this.form,
      isSubmitted: false
    };
  },
  props: {
    name: {
      type: String
    },
    lastname: {
      type: String
    },
    email: {
      type: String
    },
    age: {
      type: Number
    },
    address: {
      type: String
    },
    gender: {
      type: String
    },
    number: {
      type: String
    },
    testVal: {
      type: Number
    }

    // form: {
    //   type: Object
    // }
  },
  //   created() {
  //     EventBus.$on("ageWasEdited", data => {
  //       this.age = data;
  //     });
  //     // EventBus.$on('ageWasEdited', (age) => {
  //     //     this.userAge = age;
  //     // });
  //   },
  validations: {
    form: {
      name: {
        required
      },
      lastname: {
        required
      },
      age: {
        required,
        integer
      },
      email: {
        required,
        email
      },
      address: {
        required
      },
      gender: {
        required
      },
      number: {
        required,
        integer
      }
    }
  },
  methods: {
    status(validation) {
      return {
        error: validation.$error,
        dirty: validation.$dirty
      };
    },
    submit() {
      if (!this.$v.form.$invalid) {
        this.$emit("FormSubmit", {
          name: this.form.name,
          lastname: this.form.lastname,
          email: this.form.email,
          age: this.form.age,
          address: this.form.address,
          gender: this.form.gender,
          number: this.form.number
        });
      }
    },
    submitted() {
      this.isSubmitted = true;
    },
    axiis() {
      axios
        .post("http://127.0.0.1:8000/datas", {
          name: this.form.name,
          lastname: this.form.lastname,
          email: this.form.email,
          age: this.form.age,
          address: this.form.address,
          gender: this.form.gender,
          number: this.form.number
        })
        .then(function(response) {
          //   if (response.data.Sucsess == 200) {
          if (response.status == 200) {
            alert("Success");
          } else {
            alert("Error");
          }
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

<style>
</style>