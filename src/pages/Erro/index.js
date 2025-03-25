import ContainerErro from "../../components/ContainerErro";
import styles from "./Erro.module.css";
import { Link } from "react-router-dom";

function Erro() {
  return (
    <ContainerErro>
      <h404>404</h404>
      <p>Oops! A página que você está procurando não foi encontrada.</p>
      <Link to="/">
        <button className={styles.button}>Voltar para a página inicial</button>
      </Link>
    </ContainerErro>
  );
}

export default Erro;
