<template>
    <div class="container">
        <form name="myForm">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <h1>File a Complaint</h1>
                    <hr>
                    <div class="form-group">
                        <label for="email">Mail</label>
                        <input
                                type="text"
                                id="email"
                                name="email"
                                class="form-control"
                                v-model="userData.email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                v-model="userData.password">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input
                                type="text"
                                id="age"
                                name="age"
                                class="form-control"
                                v-model="userData.age">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
                    <label for="message">Message</label><br>
                    <!-- Interpolation between <textarea>{{ test }}</textarea> doesn't work!-->
                    <textarea
                            id="message"
                            rows="5"
                            class="form-control"
                            v-model="userData.message"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="sendmail">
                            <input
                                    type="checkbox"
                                    id="sendmail"
                                    value="SendMail"
                                    v-model="sendMail"> Send Mail
                        </label>
                        <label for="sendInfomail">
                            <input
                                    type="checkbox"
                                    id="sendInfomail"
                                    value="SendInfoMail"
                                    v-model="sendMail"> Send Infomail
                        </label>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-group">
                    <label for="male">
                        <input
                                type="radio"
                                id="male"
                                value="Male"
                                v-model="gender"> Male
                    </label>
                    <label for="female">
                        <input
                                type="radio"
                                id="female"
                                value="Female"
                                v-model="gender"> Female
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 from-group">
                    <label for="priority">Priority</label>
                    <select
                            id="priority"
                            class="form-control"
                            v-model="selectedPriority">
                        <option v-for="priority in priorities" >{{ priority }}</option>
                        <!-- inside options :selected="priority == 'Medium'" -->
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <app-switch v-model="dataSwitch"></app-switch>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <button
                            class="btn btn-primary"
                            @click="validateForm"
                            @click.prevent="submitted">Submit!
                    </button>
                </div>
            </div>
        </form>
        <hr>
        <div class="row" v-if="isSubmitted">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Your Data</h4>
                    </div>
                    <div class="panel-body">
                        <p>Email : {{ userData.email }}</p>
                        <p>Password : {{ userData.password }}</p>
                        <p>Age : {{ userData.age }}</p>
                        <p>Message : {{ userData.message }}</p>
                        <p><strong>Send Mail?</strong></p>
                        <ul>
                            <li v-for="item in sendMail">{{ item }}</li>
                        </ul>
                        <p>Gender: {{ gender }}</p>
                        <p>Priority: {{ selectedPriority }} </p>
                        <p>Switched: {{ dataSwitch }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Switch from "./Switch.vue";

export default {
  data() {
    return {
      userData: {
        email: "",
        password: "",
        age: "",
        message: "New text"
      },
      sendMail: [],
      gender: "Male",
      selectedPriority: "High",
      priorities: ["High", "Medium", "Low"],
      dataSwitch: true,
      isSubmitted: false,
      err: 0
    };
  },
  methods: {
    submitted() {
      //   this.isSubmitted = true;
      if (this.err == 0) {
        this.isSubmitted = true;
      }
    },
    validateForm() {
      this.err = 0;
      var lnSend = this.sendMail.length;
      var ckEmail = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
      var ckNum = /[^0-9]+$/;
      if (this.userData.email == "") {
        alert("Field cannot be Empty please Enter Email");
        this.err++;
        return false;
      } else if (!this.userData.email.match(ckEmail)) {
        alert("Invalid Email");
        this.err++;
        return false;
      }
      if (this.userData.password == "") {
        alert("Field cannot be Empty please Enter Password");
        this.err++;
        return false;
      }
      if (this.userData.age == "") {
        alert("Field cannot be Empty please Enter Age");
        this.err++;
        return false;
      } else if (this.userData.age.match(ckNum)) {
        alert("Invalid Age");
        this.err++;
        return false;
      }
      if (lnSend == 0) {
        alert("Select atleast one Recipient");
        this.err++;
      }
    }
  },
  components: {
    appSwitch: Switch
  }
};
</script>

<style>
</style>
