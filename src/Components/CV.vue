<template>
  <div class="cv">
    <div class="row">
      <!-- <div class="photo">
        <img :src="photo">
      </div> -->
    </div>
    <div class="row">
      <div class="experience">
        <h1>Expérience</h1>
        <timeline orientation="vertical" name="experience">
          <timeline-el title="Technicien Systèmes et Réseaux" date="2012 - 2017">
            <ul>
              <li>Support niveau 1, 2 et 3</li>
              <li>Mise en place d’infrastructures systèmes et réseaux</li>
              <li>Mise en place de systèmes de supervision</li>
              <li>Développement d’applications Web</li>
            </ul>
          </timeline-el>
          <timeline-el title="Technicien de Maintenance IT" date="2011">
            <ul>
              <li>Remplacement de postes informatiques</li>
            </ul>
          </timeline-el>
          <timeline-el title="Technicien de Déploiement" date="2011">
            <ul>
              <li>Remplacement d’écrans</li>
            </ul>
          </timeline-el>
          <timeline-el title="Conseiller Informatique" date="2009 - 2011">
            <ul>
              <li>Support niveau 1</li>
            </ul>
          </timeline-el>
        </timeline>
      </div>
      <div class="row second">
        <div class="social">
          <a href="https://github.com/Vilsafur" target="_blank" alt="lien github"><img :src="github"></a>
          <a href="https://fr.linkedin.com/in/cyril-poidevin-941695110" target="_blank" alt="lien linkedin"><img :src="linkedin"></a>
          <a href="http://www.viadeo.com/fr/profile/cyril.poidevin" target="_blank" alt="lien viadeo"><img :src="viadeo"></a>
          <a href="mailto:cyril.poidevin@gmail.com"><img :src="mailto"></a>
        </div>
        <div class="formation">
          <h1>Formation</h1>
          <timeline orientation="horizontal" name="formation">
            <timeline-el title="GMSI" date="2011">
              <p>Gestionnaire de Maintenance des Systèmes Informatiques<br>
              Titre de niveau III</p>
            </timeline-el>
            <timeline-el title="Baccalauréat STL" date="2007">
              <p>Science et Technique de Laboratoire</p>
            </timeline-el>
          </timeline>
        </div>
        <div class="competences">
          <h1>Compétences</h1>
          <h2>Développement</h2>
          <div class="developpement">
            <p>HTML : <progress value="4" max="6"></progress></p>
            <p>CSS : <progress value="4" max="6"></progress></p>
            <p>PHP : <progress value="4" max="6"></progress></p>
            <p>NodeJS : <progress value="2" max="6"></progress></p>
            <p>JavaScript : <progress value="2" max="6"></progress></p>
            <p>C++ : <progress value="2" max="6"></progress></p>
            <p>Wordpress : <progress value="2" max="6"></progress></p>
            <p>Python : <progress value="1" max="6"></progress></p>
          </div>
          <h2>Systèmes et Réseaux</h2>
          <div class="systemes">
            <p>Supervision - Monitoring : <progress value="5.5" max="6"></progress></p>
            <p>Gestion de parc : <progress value="5.5" max="6"></progress></p>
            <p>Service Client : <progress value="5" max="6"></progress></p>
            <p>Virtualisation : <progress value="4.5" max="6"></progress></p>
            <p>Windows Server : <progress value="4.5" max="6"></progress></p>
            <p>Linux (Debian - Ubuntu) : <progress value="4.5" max="6"></progress></p>
            <p>Cisco ASA : <progress value="4" max="6"></progress></p>
            <p>Microsoft Office : <progress value="3" max="6"></progress></p>
          </div>
        </div>
        <div class="interet"></div>
      </div>
    </div>
  </div>
</template>

<script>
import Timeline from './timeline/Timeline.vue'
import TimelineEl from './timeline/TimelineEl.vue'

export default {
  components: {
    Timeline,
    TimelineEl
  },
  data: function () {
    return {
      photo: "./dist/assets/picts/photo.jpg",
      github: "./dist/assets/picts/social/github.png",
      linkedin: "./dist/assets/picts/social/linkedin.png",
      viadeo: "./dist/assets/picts/social/viadeo.png",
      mailto: "./dist/assets/picts/social/mailto.png"
    }
  }
}
</script>

<style>
.cv {
  width: 100%;
  padding: 20px;
}
.cv .row {
  width: 100%;
  display: flex;
  justify-content: flex-end;
  flex-flow: row nowrap;
}

.experience h1, .formation h1 {
  margin-bottom: -40px;
  text-align: center;
}

.row.second {
  flex-flow: column wrap;
  align-items: center;
  justify-content: flex-start;
}

.social {
  align-self: flex-end;
}

.competences {
  display: flex;
  flex-flow: column wrap;
  padding-left: 20px;
}

.competences h1 {
  align-self: center;
}

.competences div {
  display: flex;
  flex-flow: row wrap;
}

.developpement, .systemes {
  justify-content: space-between;
}

.developpement p, .systemes p {
}

progress {
  width: 40%;
  padding: 4px;
  border: 0 none;
  background: #444;
  border-radius: 14px;
  box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
}
progress::-moz-progress-bar {
  border-radius: 12px;
  background: #FFF;
  box-shadow: inset 0 -2px 4px rgba(0,0,0,0.4), 0 2px 5px 0px rgba(0,0,0,0.3);

}
/* webkit */
@media screen and (-webkit-min-device-pixel-ratio:0) {
  progress {
    height: 25px;
  }
}
progress::-webkit-progress-bar {
    background: transparent;
}
progress::-webkit-progress-value {
  border-radius: 12px;
  background: #FFF;
  box-shadow: inset 0 -2px 4px rgba(0,0,0,0.4), 0 2px 5px 0px rgba(0,0,0,0.3);
}



@media (max-width: 1200px) {
  .cv .row {
    flex-flow: column nowrap;
  }
  progress {
    width: 20%;
  }
}
</style>
