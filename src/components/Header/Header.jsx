import styles from './Header.module.css'
import {Logo} from "./Logo/Logo";
import {SearchBar} from "./SearchBar/SearchBar";
import {Profile} from "./Profile/Profile";

export const Header = () => {
    return <div className={styles.header}>
        <Logo/>
        <SearchBar/>
        <Profile/>
    </div>
}