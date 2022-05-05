<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="LAST_NAME", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="FIRST_NAME", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LOGIN", type="string", length=128, nullable=false, options={"fixed"=true})
     */
    private $login;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_LAST_CHANGE_PW", type="date", nullable=true)
     */
    private $dateLastChangePw;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=128, nullable=false, options={"fixed"=true})
     */
    private $password;

    /**
     * @var bool
     *
     * @ORM\Column(name="EMPLOYEE", type="boolean", nullable=true)
     */
    private $employee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="POST", type="string", length=128, nullable=true)
     */
    private $post;

    /**
     * @var int|null
     *
     * @ORM\Column(name="PHONE", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMAIL", type="string", length=256, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STREET", type="string", length=256, nullable=true)
     */
    private $street;

    /**
     * @var int|null
     *
     * @ORM\Column(name="POSTCODE", type="integer", nullable=true)
     */
    private $postcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CITY", type="string", length=128, nullable=true)
     */
    private $city;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json", nullable=false)
     */
    private $roles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getDateLastChangePw(): ?\DateTimeInterface
    {
        return $this->dateLastChangePw;
    }

    public function setDateLastChangePw(?\DateTimeInterface $dateLastChangePw): self
    {
        $this->dateLastChangePw = $dateLastChangePw;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmployee(): ?bool
    {
        return $this->employee;
    }

    public function setEmployee(bool $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(?string $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostcode(): ?int
    {
        return $this->postcode;
    }

    public function setPostcode(?int $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRoles(): ?array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->login;
    }
    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }
    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
