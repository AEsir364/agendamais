import React from 'react';
import styles from './Header.module.css';

import agendaIcon from './Images/Agenda+.png';
import lupaIcon from './Images/HeaderLupa.png';
import notificacoesIcon from './Images/HeaderNotifi.png';
import configuracoesIcon from './Images/HeaderConfig.png';
import perfilIcon from './Images/HeaderPerfil.png';


const Header = () => {
  return (
    <div className={styles.header}>
      <img
        src={agendaIcon}
        alt="Ícone Agenda+"
        className={styles.headerImage}
      />
      <p className={styles.headerText}>Agenda+</p>

      <div className={styles.pesquisaHeader}>
        <img
          src={lupaIcon}
          alt="Lupa"
          className={styles.iconeLupa}
        />
        <input
          type="text"
          placeholder="Procure por Disciplina"
          className={styles.barraPesquisa}
        />
      </div>

      <div className={styles.botoesHeader}>
        <a href="notificacoes">
          <button className={styles.btn}>
            <img
              src={notificacoesIcon}
              alt="Notificações"
              className={styles.iconeBtn}
            />
          </button>
        </a>
        <a href="configuracoes">
          <button className={styles.btn}>
            <img
              src={configuracoesIcon}
              alt="Configurações"
              className={styles.iconeBtn}
            />
          </button>
        </a>
        
        {/* Vou fazer depois */}
        <a href="perfil">
          <button className={styles.btn}>
            <img
              src={perfilIcon}
              alt="Perfil"
              className={styles.iconeBtn}
            />
          </button>
        </a>
      </div>
    </div>
  );
};

export default Header;
