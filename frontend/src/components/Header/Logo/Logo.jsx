import styles from "./Logo.module.css";
import logo from "../../../images/logo-icon.png";

export const Logo = () => {
    return <div>
        <a href="#">
            <img className={styles.logo} src={logo} alt="Logo"/>
        </a>
    </div>
}