import {MenuBar} from "./MenuBar/MenuBar";
import {
    BrowserRouter as Router,
    Route,

} from 'react-router-dom';
import React from "react";
import {Signup} from "./Signup/Signup";
import {Routes} from "react-router";
import {Home} from "./Home/Home";
import {Digest} from "./Digest/Digest";
import {Ideas} from "./Ideas/Ideas";
import {Teams} from "./Teams/Teams";
import {Faq} from "./Faq/Faq";
import {Profile} from "./Profile/Profile";
import {Header} from "./Header/Header";
import styles from './App.module.css'
import {Idea} from "./Ideas/Idea/Idea";
import {Error} from "./404/404";
import {Signin} from "./Signin/Signin";

export const App = (data) => {

    return (
        <Router>
            <div>
                <MenuBar icons={data.data.icons}/>
                <div className={styles.content}>
                    <Header />
                </div>
                <Routes>
                    <Route exact path="/" element={<Home />} />
                    <Route path="/signup" element={<Signup />} />
                    <Route path="/signin" element={<Signin />} />
                    <Route path="/home" element={<Home />} />
                    <Route path="/post" element={<Ideas />} />
                    <Route path="/post/:id" element={<Idea />} />
                    <Route path="/teams" element={<Teams />} />
                    <Route path="/faq" element={<Faq />} />
                    <Route path="/profile" element={<Profile/>} />
                    <Route path="*" element={<Error/>} />
                </Routes>
            </div>
        </Router>
    );
}
