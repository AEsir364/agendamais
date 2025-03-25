import styles from "./ContainerErro.module.css";

function ContainerErro({ children }) {
  return <div className={styles.container404}>{children}</div>;
}

export default ContainerErro;
