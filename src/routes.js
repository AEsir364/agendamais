import Ajuda from "./pages/Ajuda";
import Atividades from "./pages/Atividades";
import Calendario from "./pages/Calendario";
import Configuracoes from "./pages/Configuracoes";
import Disciplinas from "./pages/Disciplinas";
import Notificacoes from "./pages/Notificacoes";

import Erro from "./pages/Erro";
import Inicio from "./pages/Inicio";
import PaginaBase from "./pages/PaginaBase";

import { BrowserRouter, Route, Routes } from "react-router-dom";

function AppRoutes() {
  return (
    <BrowserRouter> 
      <Routes>
        <Route path='/' element={<PaginaBase />}>
          <Route index element={<Inicio />} />
          <Route path='ajuda' element={<Ajuda />} />
          <Route path='atividades' element={<Atividades />} />
          <Route path='calendario' element={<Calendario />} />
          <Route path='configuracoes' element={<Configuracoes />} />
          <Route path='disciplinas' element={<Disciplinas />} />
          <Route path='notificacoes' element={<Notificacoes />} />
        </Route>
        <Route path='*' element={<Erro />} />
      </Routes>
    </BrowserRouter>
  );
}

export default AppRoutes;
