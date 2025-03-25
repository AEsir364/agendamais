import React from 'react';
import { Link } from 'react-router-dom';
import styles from './BarraLateral.module.css';

import homeIcon from './Images/LateralHome.png';
import disciplinasIcon from './Images/LateralMateri.png';
import atividadesIcon from './Images/LateralPluma.png';
import calendarioIcon from './Images/LateralCalend.png';
import configuracoesIcon from './Images/LateralConfig.png';
import ajudaIcon from './Images/LateralAjuda.png';
import sairIcon from './Images/LateralSair.png';

const BarraLateral = () => {
  return (
    <div className={styles.barraLateral}>
      <h3>MENU</h3>
      <div className={styles.botoesBala}>
        <Link to="/">
          <button className={styles.btl}>
            <img src={homeIcon} alt="Home" className={styles.iconeBtl} />
            <span>Início</span>
          </button>
        </Link>
        <Link to="disciplinas">
          <button className={styles.btl}>
            <img src={disciplinasIcon} alt="Disciplinas" className={styles.iconeBtl} />
            <span>Disciplinas</span>
          </button>
        </Link>
        <Link to="atividades">
          <button className={styles.btl}>
            <img src={atividadesIcon} alt="Atividades" className={styles.iconeBtl} />
            <span>Atividades</span>
          </button>
        </Link>
        <Link to="calendario">
          <button className={styles.btl}>
            <img src={calendarioIcon} alt="Calendário" className={styles.iconeBtl} />
            <span>Calendário</span>
          </button>
        </Link>
      </div>

      <h3>PREFERÊNCIAS</h3>
      <div className={styles.botoesBala}>
        <Link to="configuracoes">
          <button className={styles.btl}>
            <img src={configuracoesIcon} alt="Configurações" className={styles.iconeBtl} />
            <span>Configurações</span>
          </button>
        </Link>
        <Link to="ajuda">
          <button className={styles.btl}>
            <img src={ajudaIcon} alt="Ajuda" className={styles.iconeBtl} />
            <span>Ajuda</span>
          </button>
        </Link>
      </div>
      {/* Depois eu faço 
      <div className={styles.sair}>
        <Link to="logout">
          <button className={styles.btlSair}>
            <img src={sairIcon} alt="Sair" className={styles.iconeSair} />
            <span className={styles.textoSair}>Sair</span>
          </button>
        </Link>
      </div>
      */}
    </div>
  );
};

export default BarraLateral;
